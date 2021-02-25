<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoryImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('inventory_item_id');
            $table->string('inventory_image_name');
            $table->string('inventory_image_path');
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
        Schema::dropIfExists('inventory_images');
    }
}
