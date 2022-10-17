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
            $table->integer('numberSerial');
            $table->unsignedInteger('customerId');
            $table->foreign('customerId')->references('customerId')->on('customers');
            $table->unsignedInteger('serviceId');
            $table->foreign('serviceId')->references('serviceId')->on('services');
            $table->date('created_at');
            $table->date('numberExpiry');
            $table->string('numberST');
            $table->string('numberSupply');
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
