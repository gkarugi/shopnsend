<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopnsendBalanceHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shopnsend_balance_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('transactionable_type')->nullable();
            $table->bigInteger('transactionable_id')->nullable()->unsigned();
            $table->string('currency');
            $table->bigInteger('current_balance')->nullable();
            $table->bigInteger('amount')->nullable();
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
        Schema::dropIfExists('shopnsend_balance_histories');
    }
}
