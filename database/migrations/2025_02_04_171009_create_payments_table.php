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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('ref');
            $table->date('date_of_payment');
            $table->unsignedBigInteger('account_id');
            $table->string('description');
            $table->string('mode');
            $table->string('cheque')->nullable();
            $table->string('payee')->nullable();
            $table->decimal('amount', 14, 2);
            $table->foreign('account_id')->references('id')->on('accounts');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
