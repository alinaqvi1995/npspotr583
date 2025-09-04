<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('quote_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quote_id')->constrained()->cascadeOnDelete();
            $table->string('status')->nullable();
            $table->string('old_status')->nullable();
            $table->foreignId('changed_by')->nullable()->constrained('users');
            $table->string('change_type')->nullable();
            $table->json('data')->nullable();
            $table->timestamps();
            $table->index(['quote_id', 'status']);
            $table->index('created_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('quote_histories');
    }
};
