<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('store_id')->unsigned()->nullable();
            $table->integer('product_grouping_id')->unsigned()->nullable();
            $table->integer('product_category_id')->unsigned()->nullable();
            $table->string('name');
            $table->string('slug')->unique();
            $table->integer('price')->unsigned();
            $table->string('currency');
            $table->text('description')->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps();

            $table->foreign('store_id')->references('id')->on('stores')
                ->onUpdate('restrict')
                ->onDelete('set null');

            $table->foreign('product_grouping_id')->references('id')->on('product_groupings')
                ->onUpdate('restrict')
                ->onDelete('set null');

            $table->foreign('product_category_id')->references('id')->on('product_categories')
                ->onUpdate('restrict')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
