<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromoHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promo_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('store_id');
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('promo_id');
            $table->unsignedBigInteger('member_discount_id');

            $table->foreign('store_id')->references('id')->on('stores');
            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('promo_id')->references('id')->on('promos');
            $table->foreign('member_discount_id')->references('id')->on('member_discounts');
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
        Schema::dropIfExists('promo_histories');
    }
}
