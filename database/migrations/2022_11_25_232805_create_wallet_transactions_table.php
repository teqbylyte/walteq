<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wallet_transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('wallet_id');
            $table->string('reference');
            $table->float('amount', 12)->default(0);
            $table->float('prev_balance', 12)->default(0);
            $table->float('new_balance', 12)->default(0);
            $table->enum('status', ['SUCCESSFUL', 'PENDING', 'FAILED'])->default('SUCCESSFUL');
            $table->enum('action', \App\Models\WalletTransaction::ACTION);
            $table->enum('type', \App\Models\WalletTransaction::TYPES);
            $table->longText('info')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wallet_transactions');
    }
};
