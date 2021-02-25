<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoryDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('inventory_item_id');
            $table->integer('stock');
            $table->double('promo_price')->nullable();
            $table->string('description')->nullable();
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
        Schema::dropIfExists('inventory_details');
    }
}
