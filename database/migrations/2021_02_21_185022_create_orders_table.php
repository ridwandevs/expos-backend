<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('store_id');
            $table->unsignedBigInteger('outlet_id');
            $table->string('order_id');
            $table->unsignedBigInteger('membership_id')->nullable();
            $table->integer('order_item_quantity')->nullable();

            $table->unsignedBigInteger('member_discount_id')->nullable();
            $table->unsignedBigInteger('promo_id')->nullable();

            $table->decimal('order_discount_total')->nullable();
            $table->decimal('order_sub_total')->nullable();
            $table->decimal('order_tax')->nullable();
            $table->decimal('order_total')->nullable();
            $table->boolean('e-receipt')->default(false);
            $table->unsignedBigInteger('payment_method_id');
            $table->string('payment_references')->nullable();
            $table->string('payment_status')->nullable();

            $table->foreign('payment_method_id')->references('id')->on('payment_methods');
            $table->foreign('member_discount_id')->references('id')->on('member_discounts');
            $table->foreign('promo_id')->references('id')->on('promos');
            $table->foreign('membership_id')->references('id')->on('memberships');
            $table->foreign('outlet_id')->references('id')->on('outlets');
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
        Schema::dropIfExists('orders');
    }
}
