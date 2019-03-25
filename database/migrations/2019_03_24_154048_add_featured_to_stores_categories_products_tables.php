<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFeaturedToStoresCategoriesProductsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stores', function (Blueprint $table) {
            $table->boolean('featured')->default(false)->after('active');
        });

        Schema::table('product_categories', function (Blueprint $table) {
            $table->boolean('featured')->default(false)->after('active');
        });

        Schema::table('products', function (Blueprint $table) {
            $table->boolean('featured')->default(false)->after('active');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stores', function (Blueprint $table) {
            $table->dropColumn('featured');
        });

        Schema::table('product_categories', function (Blueprint $table) {
            $table->dropColumn('featured');
        });

        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('featured');
        });
    }
}
