<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembershipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('memberships', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('store_id');
            $table->unsignedBigInteger('membership_type_id');
            $table->string('member_name');
            $table->string('member_email')->nullable();
            $table->string('member_phone')->nullable();
            $table->dateTime('member_expire')->nullable();
            $table->boolean('member_newsletter')->default(false);
            $table->foreign('store_id')->references('id')->on('stores');
            $table->foreign('membership_type_id')->references('id')->on('membership_types');
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
        Schema::dropIfExists('memberships');
    }
}
