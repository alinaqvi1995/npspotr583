<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('quotes', function (Blueprint $table) {
            $table->id();

            // Relations
            $table->foreignId('category_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('subcategory_id')->nullable()->constrained()->nullOnDelete();

            // Vehicle & Locations
            $table->string('vehicle_type')->nullable();
            $table->string('pickup_location')->nullable();
            $table->string('delivery_location')->nullable();

            // Dates
            $table->date('pickup_date')->nullable();
            $table->date('delivery_date')->nullable();
            $table->date('available_date')->nullable();
            $table->date('expiration_date')->nullable();

            // Customer Info
            $table->string('customer_name')->nullable();
            $table->string('customer_email')->nullable();
            $table->string('customer_phone')->nullable();

            // Quote Details
            $table->text('additional_info')->nullable();
            $table->string('status')->default('New');

            // Payment Info
            $table->decimal('amount_to_pay', 10, 2)->nullable();
            $table->string('cop_cod')->nullable();
            $table->decimal('cop_cod_amount', 10, 2)->nullable();
            $table->decimal('balance', 10, 2)->nullable();
            $table->decimal('balance_amount', 10, 2)->nullable();

            // Extra Info
            $table->string('load_id')->nullable();
            $table->text('pre_dispatch_notes')->nullable();
            $table->text('transport_special_instructions')->nullable();
            $table->text('load_specific_terms')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('quotes');
    }
};
