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
            $table->unsignedBigInteger('verify_id')->nullable();
            $table->string('state_sell')->nullable();
            $table->string('want_to_buy')->nullable();
            $table->string('total_payment')->nullable();
            $table->string('network')->nullable();
            $table->string('wallet_address')->nullable();
            $table->integer('type')->nullable();
            $table->integer('status')->nullable();
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
