<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('authorization_forms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('quote_id');
            $table->string('auth_date');
            $table->string('purchase_for');
            $table->string('company_name')->nullable();
            $table->string('cardholder_name');
            $table->string('billing_address');
            $table->string('city');
            $table->string('state');
            $table->string('zip');
            $table->string('phone');
            $table->string('card_type');
            $table->string('card_number');
            $table->string('expiry_date');
            $table->string('cvv');
            $table->string('issuing_bank')->nullable();
            $table->string('bank_number')->nullable();
            $table->decimal('invoice_amount', 10, 2);
            $table->text('signature_image'); // Changed to text
            $table->json('attachments')->nullable();
            $table->string('ip_address')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('authorization_forms');
    }
};
