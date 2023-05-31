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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('shipping_addr_id')->constrained('addresses')->cascadeOnDelete();
            $table->foreignId('billing_addr_id')->constrained('addresses')->cascadeOnDelete();
            $table->unsignedBigInteger('number');
            $table->enum('status', ['pending', 'processing', 'completed', 'canceled', 'refund'])->default('pending');
            $table->string('payment_method')->default('COD');
            $table->enum('payment_status', ['pending', 'failed', 'done'])->default('pending');
            $table->unsignedBigInteger('total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};