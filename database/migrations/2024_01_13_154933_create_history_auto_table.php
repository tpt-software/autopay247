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
        Schema::create('history_auto', function (Blueprint $table) {
            $table->id();
            $table->string('bank');
            $table->string('type');
            $table->string('name_coin');
            $table->string('amount_coin');
            $table->string('stk');
            $table->string('time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history_auto');
    }
};
