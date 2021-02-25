<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('store_id');
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('inventory_item_id');

            $table->integer('order_item_quantity');
            $table->decimal('order_item_discount')->nullable();
            $table->decimal('order_item_total');

            $table->foreign('store_id')->references('id')->on('stores');
            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('inventory_item_id')->references('id')->on('inventory_items');
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
        Schema::dropIfExists('order_items');
    }
}
