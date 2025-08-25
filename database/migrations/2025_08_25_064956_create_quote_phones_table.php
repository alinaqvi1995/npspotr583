<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('quote_phones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quote_location_id')->constrained()->cascadeOnDelete();
            $table->string('phone');
            $table->string('type')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('quote_phones');
    }
};
