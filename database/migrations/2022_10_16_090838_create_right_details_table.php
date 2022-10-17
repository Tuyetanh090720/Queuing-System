<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRightDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('right_details', function (Blueprint $table) {
            $table->increments('rightDetailId');
            $table->unsignedInteger('rightId');
            $table->foreign('rightId')->references('rightId')->on('rights');
            $table->unsignedInteger('rightFunctionId');
            $table->foreign('rightFunctionId')->references('rightFunctionId')->on('right_functions');
            $table->date('created_at');
            $table->date('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('right_details');
    }
}
