<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('uuid');
            $table->string('user_uuid')->nullable();
            $table->decimal('amount', 10, 0);
            $table->decimal('bank_amount', 10, 0)->default(0);
            $table->decimal('crypto_amount', 10, 2);
            $table->string('state');
            $table->string('network');
            $table->string('address_wallet');
            $table->datetime('expired_in');
            $table->longText('qrCode');
            $table->boolean('status')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
