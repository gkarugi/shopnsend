<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRedeemedOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('redeemed_order_items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->integer('order_item_id')->unsigned();
            $table->integer('quantity')->unsigned();
            $table->integer('fulfilled_by')->unsigned();
            $table->integer('store_branch_id')->unsigned();
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
        Schema::dropIfExists('redeemed_order_items');
    }
}
