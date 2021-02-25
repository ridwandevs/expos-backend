<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffAttandancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff_attandances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('staff_id');
            $table->date('date');
            $table->dateTime('clock_in')->nullable();
            $table->dateTime('clock_out')->nullable();
            $table->dateTime('break_out')->nullable();
            $table->dateTime('break_in')->nullable();
            $table->integer('working_hours')->default(0);
            $table->integer('late_hours')->default(0);
            $table->integer('ot_hours')->default(0);
            $table->foreign('staff_id')->references('id')->on('staff');
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
        Schema::dropIfExists('staff_attandances');
    }
}
