<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('store_id');
            $table->unsignedBigInteger('staff_role_id');
            $table->string('staff_name');
            $table->string('staff_username')->unique();
            $table->string('password');
            $table->string('staff_email')->unique()->nullable();
            $table->string('staff_phone')->nullable();
            $table->boolean('staff_active')->default(true);
            $table->foreign('staff_role_id')->references('id')->on('staff_roles');
            $table->foreign('store_id')->references('id')->on('stores');
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
        Schema::dropIfExists('staff');
    }
}
