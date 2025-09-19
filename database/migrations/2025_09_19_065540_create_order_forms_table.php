<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('order_forms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('quote_id')->unique();

            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('customer_phone')->nullable();

            $table->string('pickup_address1');
            $table->string('pickup_contact_name');
            $table->string('pickup_contact_email')->nullable();
            $table->dateTime('pickup_date');

            $table->string('delivery_address1');
            $table->string('delivery_contact_name');
            $table->string('delivery_contact_email')->nullable();
            $table->dateTime('delivery_date');

            $table->text('special_instructions')->nullable();
            $table->enum('payment_option', ['now', 'later']);

            $table->string('signature_name');
            $table->date('signature_date');

            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('modified_by')->nullable();

            $table->timestamps();

            $table->foreign('quote_id')
                ->references('id')
                ->on('quotes')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_forms');
    }
};
