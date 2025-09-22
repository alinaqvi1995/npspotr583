<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            
            $table->string('heading_one')->nullable();
            $table->text('description_one')->nullable();
            $table->string('image_one')->nullable();

            $table->string('heading_two')->nullable();
            $table->text('description_two')->nullable();
            $table->string('image_two')->nullable();

            $table->text('description_two_one')->nullable();
            $table->text('description_two_two')->nullable();
            $table->text('description_two_three')->nullable();
            $table->text('description_two_four')->nullable();
            $table->text('description_two_five')->nullable();
            $table->text('description_two_six')->nullable();
            $table->text('description_two_seven')->nullable();

            $table->string('heading_three')->nullable();
            $table->text('description_three')->nullable();
            $table->string('image_three')->nullable();
            $table->string('image_four')->nullable();

            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('subcategory_id')->nullable();

            $table->string('slug')->unique();
            $table->string('title')->nullable();

            $table->unsignedBigInteger('created_by')->nullable();

            $table->tinyInteger('status')->default(1);

            $table->string('ques_one')->nullable();
            $table->text('ans_one')->nullable();
            $table->string('ques_two')->nullable();
            $table->text('ans_two')->nullable();
            $table->string('ques_three')->nullable();
            $table->text('ans_three')->nullable();
            $table->string('ques_four')->nullable();
            $table->text('ans_four')->nullable();
            $table->string('ques_five')->nullable();
            $table->text('ans_five')->nullable();

            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
            $table->foreign('subcategory_id')->references('id')->on('subcategories')->onDelete('set null');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
