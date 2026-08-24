<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;

/**
 * Read-only pre-flight check for the customer authorization form.
 *
 * Run it on a server straight after deploying. Every failure it reports is one
 * that would otherwise surface to a customer as the generic
 * "We could not save your authorization" message.
 */
class AuthFormDoctor extends Command
{
    protected $signature = 'authform:doctor';

    protected $description = 'Check that the authorization form flow is correctly set up on this environment';

    private int $failures = 0;

    private array $remedies = [];

    public function handle(): int
    {
        $this->newLine();
        $this->line('  <fg=cyan;options=bold>Authorization form pre-flight check</>');
        $this->newLine();

        $this->checkSchema();
        $this->checkRelatedTables();
        $this->checkStorage();
        $this->checkEncryption();
        $this->checkRoutesAndConfig();

        $this->newLine();

        if ($this->failures === 0) {
            $this->info('  All checks passed — the authorization form is ready to take submissions.');
            $this->newLine();

            return self::SUCCESS;
        }

        $this->error("  {$this->failures} check(s) failed.");
        $this->newLine();
        $this->line('  <options=bold>To fix:</>');

        foreach (array_unique($this->remedies) as $remedy) {
            $this->line("    {$remedy}");
        }

        $this->newLine();

        return self::FAILURE;
    }

    // ─────────────────────────────────────────────────────────────────────────

    private function checkSchema(): void
    {
        $this->line('  <options=bold>Database schema</>');

        if (! Schema::hasTable('authorization_forms')) {
            $this->problem('authorization_forms table', 'missing', $this->migrateHint('2025_12_15_113859_create_authorization_forms_table'));

            return;
        }

        $this->pass('authorization_forms table exists');

        $hint = $this->migrateHint('2026_08_18_100000_harden_authorization_forms_table');

        foreach (['card_last_four', 'user_agent', 'submitted_at'] as $column) {
            Schema::hasColumn('authorization_forms', $column)
                ? $this->pass("column {$column}")
                : $this->problem("column {$column}", 'missing', $hint);
        }

        // Encrypted card data needs TEXT; VARCHAR(255) is close enough to the
        // ciphertext length to start truncating or erroring under strict mode.
        $types = collect(DB::select('SHOW COLUMNS FROM authorization_forms'))
            ->pluck('Type', 'Field');

        foreach (['card_number', 'cvv', 'expiry_date'] as $column) {
            $type = strtolower((string) ($types[$column] ?? ''));

            str_contains($type, 'text')
                ? $this->pass("column {$column} is TEXT")
                : $this->problem("column {$column}", "is {$type}, needs TEXT for encrypted values", $hint);
        }

        $indexes = collect(DB::select('SHOW INDEX FROM authorization_forms'));

        $indexes->contains(fn ($i) => $i->Key_name === 'PRIMARY')
            ? $this->pass('primary key on id')
            : $this->problem('primary key on id', 'missing — inserts will fail', $hint);

        $idType = collect(DB::select('SHOW COLUMNS FROM authorization_forms'))
            ->firstWhere('Field', 'id');

        ($idType && str_contains(strtolower((string) $idType->Extra), 'auto_increment'))
            ? $this->pass('id is AUTO_INCREMENT')
            : $this->problem('id AUTO_INCREMENT', 'missing — inserts will fail', $hint);

        $indexes->contains(fn ($i) => $i->Key_name === 'authorization_forms_quote_id_unique')
            ? $this->pass('unique index on quote_id')
            : $this->warn('  ~  unique index on quote_id missing (duplicates possible under load)');

        $this->newLine();
    }

    private function checkRelatedTables(): void
    {
        $this->line('  <options=bold>Related tables</>');

        Schema::hasTable('quote_payments')
            ? $this->pass('quote_payments table exists')
            : $this->problem('quote_payments table', 'missing — every submission will roll back', $this->migrateHint('2026_02_20_000000_create_quote_payments_table'));

        Schema::hasTable('activities')
            ? $this->pass('activities table exists')
            : $this->warn('  ~  activities table missing (submissions still work; audit logging is skipped)');

        if (Schema::hasTable('zipcodes')) {
            $count = DB::table('zipcodes')->count();

            $count > 0
                ? $this->pass("zipcodes table populated ({$count} rows)")
                : $this->problem('zipcodes table', 'empty — no address can be validated', 'Import the zipcodes dataset.');

            $hasIndex = collect(DB::select('SHOW INDEX FROM zipcodes'))
                ->contains(fn ($i) => str_starts_with((string) $i->Key_name, 'zipcodes_'));

            $hasIndex
                ? $this->pass('zipcodes search indexes present')
                : $this->warn('  ~  zipcodes has no search index — autocomplete will be slow: '.$this->migrateHint('2026_08_18_100100_add_search_indexes_to_zipcodes_table'));
        } else {
            $this->problem('zipcodes table', 'missing', 'Import the zipcodes dataset.');
        }

        $this->newLine();
    }

    private function checkStorage(): void
    {
        $this->line('  <options=bold>File storage</>');

        foreach (['quote/authorization_attachments', 'quote/authorization_signatures'] as $relative) {
            $path = public_path($relative);

            if (! is_dir($path)) {
                if (@mkdir($path, 0755, true) && is_dir($path)) {
                    $this->pass("created {$relative}");

                    continue;
                }

                $this->problem($relative, 'cannot be created', "mkdir -p public/{$relative} && chown -R www-data:www-data public/quote");

                continue;
            }

            is_writable($path)
                ? $this->pass("{$relative} is writable")
                : $this->problem($relative, 'not writable by the web user', 'chown -R www-data:www-data public/quote && chmod -R 755 public/quote');
        }

        extension_loaded('gd')
            ? $this->pass('GD extension loaded (signature validation)')
            : $this->warn('  ~  GD not loaded — signatures are accepted on size checks alone');

        $this->newLine();
    }

    private function checkEncryption(): void
    {
        $this->line('  <options=bold>Encryption</>');

        if (empty(config('app.key'))) {
            $this->problem('APP_KEY', 'not set', 'php artisan key:generate');
            $this->newLine();

            return;
        }

        try {
            Crypt::decryptString(Crypt::encryptString('4242424242424242')) === '4242424242424242'
                ? $this->pass('encrypt/decrypt round-trip works')
                : $this->problem('encryption', 'round-trip mismatch', 'Check APP_KEY and APP_CIPHER.');
        } catch (\Throwable $e) {
            $this->problem('encryption', $e->getMessage(), 'Check APP_KEY and APP_CIPHER.');
        }

        $this->newLine();
    }

    private function checkRoutesAndConfig(): void
    {
        $this->line('  <options=bold>Routes and config</>');

        foreach (['authorization.show', 'authorization.store', 'frontend.thankyou', 'zipcode.searchByLocation'] as $name) {
            Route::has($name)
                ? $this->pass("route {$name}")
                : $this->problem("route {$name}", 'not registered', 'php artisan route:clear');
        }

        config('mail.admin_address')
            ? $this->pass('mail.admin_address configured')
            : $this->warn('  ~  mail.admin_address empty — admin notifications are skipped');

        $this->newLine();
    }

    // ─────────────────────────────────────────────────────────────────────────

    private function pass(string $label): void
    {
        $this->line("  <fg=green>OK</>  {$label}");
    }

    private function problem(string $label, string $reason, string $remedy): void
    {
        $this->failures++;
        $this->remedies[] = $remedy;
        $this->line("  <fg=red>NO</>  {$label} — {$reason}");
    }

    private function migrateHint(string $migration): string
    {
        return "php artisan migrate --force --path=database/migrations/{$migration}.php";
    }
}
