<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_discounts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('store_id');
            $table->unsignedBigInteger('membership_type_id');
            $table->string('discount_name');
            $table->integer('discount_percentage')->nullable();
            $table->decimal('discount_fixed')->nullable();
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
        Schema::dropIfExists('member_discounts');
    }
}
