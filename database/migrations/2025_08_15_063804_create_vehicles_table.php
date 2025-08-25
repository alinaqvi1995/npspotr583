<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('quote_id');
            $table->string('make');
            $table->string('model');
            $table->integer('year');
            $table->string('color')->nullable();
            $table->string('vin')->nullable();
            $table->integer('length_ft')->nullable();
            $table->integer('length_in')->nullable();
            $table->integer('width_ft')->nullable();
            $table->integer('width_in')->nullable();
            $table->integer('height_ft')->nullable();
            $table->integer('height_in')->nullable();
            $table->float('weight')->nullable();
            $table->enum('condition', ['Running', 'Non-Running'])->default('Running');
            $table->tinyInteger('modified')->default(0);
            $table->text('modified_info')->nullable();
            $table->tinyInteger('available_at_auction')->default(0);
            $table->string('available_link')->nullable();
            $table->string('trailer_type')->nullable();
            $table->string('load_method')->nullable();
            $table->string('unload_method')->nullable();
            $table->string('type')->nullable();
            $table->string('lot_number')->nullable();
            $table->string('license_plate')->nullable();
            $table->string('license_state')->nullable();
            $table->timestamps();

            $table->foreign('quote_id')->references('id')->on('quotes')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
