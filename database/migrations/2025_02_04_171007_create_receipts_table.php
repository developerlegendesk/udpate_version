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
        Schema::create('receipts', function (Blueprint $table) {
            $table->id();
            $table->string('ref');
            $table->date('date_of_receipt');
            $table->unsignedBigInteger('invoice_id');
            $table->unsignedBigInteger('account_id');
            $table->string('description');
            $table->decimal('amount', 14, 2);
            $table->foreign('invoice_id')->references('id')->on('invoices');
            $table->foreign('account_id')->references('id')->on('accounts');
            $table->decimal('itax', 14, 2)->nullable();
            $table->decimal('stax', 14, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receipts');
    }
};
