<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('quote_payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('quote_id');
            $table->decimal('amount', 12, 2);
            $table->string('channel'); // Stripe, Card Authorization, Zelle, Cash App, Venmo, Paypal, etc.
            $table->string('status')->default('Paid'); // Paid, Authorized, Pending
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->foreign('quote_id')
                ->references('id')
                ->on('quotes')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('quote_payments');
    }
};
