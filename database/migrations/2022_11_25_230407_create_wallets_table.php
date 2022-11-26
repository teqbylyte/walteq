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
        Schema::create('wallets', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('unique_id')->unique();
            $table->string('full_name');
            $table->string('email')->unique();
            $table->float('balance')->default(0);
            $table->enum('status', ['ACTIVE', 'SUSPENDED', 'INACTIVE'])->default('ACTIVE');
            $table->boolean('disable_debit')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wallets');
    }
};
