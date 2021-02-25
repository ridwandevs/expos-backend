<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHardwareTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hardware', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('store_id');
            $table->unsignedBigInteger('hardware_type_id');
            $table->string('hardware_brand');
            $table->string('hardware_serial_number');
            $table->boolean('hardware_warranty')->default(true);
            $table->dateTime('hardware_warranty_expire')->nullable();
            $table->foreign('store_id')->references('id')->on('stores');
            $table->foreign('hardware_type_id')->references('id')->on('hardware_types');
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
        Schema::dropIfExists('hardware');
    }
}
