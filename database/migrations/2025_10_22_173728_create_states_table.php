<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
// database/migrations/xxxx_xx_xx_create_states_table.php
public function up(): void
{
    Schema::create('states', function (Blueprint $table) {
        $table->id();
        $table->string('state_name');
        $table->string('slug')->unique();
        $table->string('short_title')->nullable();
        $table->string('banner_image')->nullable();
        $table->string('heading_one')->nullable();
        $table->text('description_one')->nullable();
        $table->string('image_one')->nullable();
        $table->string('heading_two')->nullable();
        $table->text('description_two')->nullable();
        $table->string('image_two')->nullable();
        $table->string('heading_three')->nullable();
        $table->text('description_three')->nullable();
        $table->string('image_three')->nullable();
        $table->string('heading_four')->nullable();
        $table->text('description_four')->nullable();
        $table->string('image_four')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('states');
    }
};
