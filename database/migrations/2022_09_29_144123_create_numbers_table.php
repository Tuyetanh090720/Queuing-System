<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNumbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('numbers', function (Blueprint $table) {
            $table->increments('numberId');
            $table->unsignedInteger('customerId');
            $table->foreign('customerId')->references('customerId')->on('customers');
            $table->unsignedInteger('deviceId');
            $table->foreign('deviceId')->references('deviceId')->on('devices');
            $table->string('numberTime');
            $table->string('numberExpiry');
            $table->string('numberST');
            $table->string('numberSupply');
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
        Schema::dropIfExists('numbers');
    }
}
