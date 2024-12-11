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
        Schema::create('product_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone_number');
            $table->text('address');
            $table->string('post_code');
            $table->string('city');
            $table->text('notes')->nullable();
            $table->enum('is_paid', ['diproses', 'done'])->default('diproses');
            $table->unsignedBigInteger('total_price')->default(0);
            $table->unsignedBigInteger('discount_amount')->default(0); 
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('payment_id')->constrained()->onDelete('cascade');
            $table->foreignId('promo_code_id')->nullable()->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_transactions');
        Schema::table('product_transactions', function (Blueprint $table) {
            $table->dropColumn('is_paid');
        });
    }
};
