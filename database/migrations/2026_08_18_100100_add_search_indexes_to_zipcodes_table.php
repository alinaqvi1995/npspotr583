<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * The zipcodes table ships with ~166k rows and no indexes at all, so every
     * keystroke in a location autocomplete triggers a full table scan. These two
     * composite indexes cover the columns the search actually selects, which lets
     * MySQL answer from the index instead of touching the rows.
     */
    public function up(): void
    {
        $existing = collect(DB::select('SHOW INDEX FROM zipcodes'))->pluck('Key_name')->all();

        Schema::table('zipcodes', function (Blueprint $table) use ($existing) {
            if (! in_array('zipcodes_city_state_zipcode_index', $existing, true)) {
                $table->index(['city', 'state', 'zipcode']);
            }

            if (! in_array('zipcodes_zipcode_city_state_index', $existing, true)) {
                $table->index(['zipcode', 'city', 'state']);
            }
        });
    }

    public function down(): void
    {
        $existing = collect(DB::select('SHOW INDEX FROM zipcodes'))->pluck('Key_name')->all();

        Schema::table('zipcodes', function (Blueprint $table) use ($existing) {
            if (in_array('zipcodes_city_state_zipcode_index', $existing, true)) {
                $table->dropIndex('zipcodes_city_state_zipcode_index');
            }

            if (in_array('zipcodes_zipcode_city_state_index', $existing, true)) {
                $table->dropIndex('zipcodes_zipcode_city_state_index');
            }
        });
    }
};
