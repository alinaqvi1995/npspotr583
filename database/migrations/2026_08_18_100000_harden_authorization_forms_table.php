<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Card data is encrypted at rest from here on, so the columns that hold it
     * need room for the ciphertext. `card_last_four` keeps the masked display
     * cheap (no decryption needed just to render "**** 1234").
     *
     * The type changes are issued as raw ALTER TABLE statements on purpose:
     * Blueprint's ->change() drops the primary key and AUTO_INCREMENT off `id`
     * on MariaDB, which silently breaks every later insert.
     */
    public function up(): void
    {
        foreach (['card_number', 'cvv', 'expiry_date'] as $column) {
            DB::statement("ALTER TABLE `authorization_forms` MODIFY `{$column}` TEXT NOT NULL");
        }

        Schema::table('authorization_forms', function (Blueprint $table) {
            if (! Schema::hasColumn('authorization_forms', 'card_last_four')) {
                $table->string('card_last_four', 4)->nullable()->after('card_type');
            }

            if (! Schema::hasColumn('authorization_forms', 'user_agent')) {
                $table->string('user_agent', 512)->nullable()->after('ip_address');
            }

            if (! Schema::hasColumn('authorization_forms', 'submitted_at')) {
                $table->timestamp('submitted_at')->nullable()->after('ip_address');
            }
        });

        // One authorization form per quote — the controller already enforces this,
        // but only the index makes two concurrent submits impossible. Skipped if
        // an existing database somehow already holds duplicates.
        $hasDuplicates = DB::table('authorization_forms')
            ->select('quote_id')
            ->groupBy('quote_id')
            ->havingRaw('COUNT(*) > 1')
            ->exists();

        if (! $hasDuplicates && ! $this->indexExists('authorization_forms_quote_id_unique')) {
            Schema::table('authorization_forms', function (Blueprint $table) {
                $table->unique('quote_id');
            });
        }

        // Belt and braces: if an earlier run of this migration used ->change()
        // and cost the table its primary key, put it back.
        if (! $this->indexExists('PRIMARY')) {
            DB::statement('ALTER TABLE `authorization_forms` ADD PRIMARY KEY (`id`), MODIFY `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT');
        }
    }

    public function down(): void
    {
        if ($this->indexExists('authorization_forms_quote_id_unique')) {
            Schema::table('authorization_forms', function (Blueprint $table) {
                $table->dropUnique('authorization_forms_quote_id_unique');
            });
        }

        Schema::table('authorization_forms', function (Blueprint $table) {
            foreach (['card_last_four', 'submitted_at', 'user_agent'] as $column) {
                if (Schema::hasColumn('authorization_forms', $column)) {
                    $table->dropColumn($column);
                }
            }
        });

        // Plaintext no longer fits once rows are encrypted, so this is lossy by
        // design — only reverse on a database you are happy to truncate.
        foreach (['card_number', 'cvv', 'expiry_date'] as $column) {
            DB::statement("ALTER TABLE `authorization_forms` MODIFY `{$column}` VARCHAR(255) NOT NULL");
        }
    }

    private function indexExists(string $name): bool
    {
        return collect(DB::select('SHOW INDEX FROM authorization_forms'))
            ->contains(fn ($index) => $index->Key_name === $name);
    }
};
