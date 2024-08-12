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
        Schema::create('veryfies', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->nullable();
            $table->string('bin')->nullable();
            $table->string('account_number')->nullable();
            $table->string('account_name')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('verify_number')->nullable();
            $table->string('transaction_id')->nullable();
            $table->decimal('amount',10,0)->nullable();
            $table->tinyInteger('status')->default(0)->comment('0: not verify, 1: verified');
            $table->tinyInteger('type')->default(0)->comment('0: not verify, 1: kyc bank, 2: kyc cccd');
            $table->tinyInteger('message_type')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('veryfies');
    }
};