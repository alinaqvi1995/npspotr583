<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('vehicles', function (Blueprint $table) {
            $table->string('buyer')->nullable()->after('license_state');
            $table->string('lot')->nullable()->after('buyer');
            $table->string('gatepin')->nullable()->after('lot');
        });
    }

    public function down(): void
    {
        Schema::table('vehicles', function (Blueprint $table) {
            $table->dropColumn(['buyer', 'lot', 'gatepin']);
        });
    }
};
