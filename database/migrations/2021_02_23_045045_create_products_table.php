<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->unsignedBigInteger('store_id');
            $table->unsignedBigInteger('product_category_id');
            $table->unsignedBigInteger('inventory_item_id')->nullable();

            $table->string('product_name');
            $table->string('product_photo')->nullable();
            $table->string('product_description')->nullable();
            $table->string('product_sku')->nullable();
            $table->decimal('product_price')->nullable();
            $table->integer('stock')->nullable();

            $table->foreign('store_id')->references('id')->on('stores');
            $table->foreign('product_category_id')->references('id')->on('product_categories');
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
        Schema::dropIfExists('products');
    }
}
