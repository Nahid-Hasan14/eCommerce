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
            $table->string('order_number')->unique();
            $table->decimal('total_price', 10, 2);
            $table->integer('order_status_id');
            $table->integer('payment_method_id');
            $table->integer('payment_status_id');
            $table->text('shipping_address')->nullable();
            $table->timestamps();
            $table->foreignId('customer_id')->constrained()->onDelete('cascade');
        });

        Schema::create('order_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // pending, processing, completed, cancelled
            $table->timestamps();
        });

        Schema::create('payment_methods', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // cod, bkash, card
            $table->timestamps();
        });

        Schema::create('payment_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // unpaid, paid
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
        // Schema::dropIfExists('order_statuses');
        // Schema::dropIfExists('payment_methods');
        // Schema::dropIfExists('payment_statuses');
    }
};
