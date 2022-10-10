<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeviceDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('device_details', function (Blueprint $table) {
            $table->increments('deviceDetailId');
            $table->unsignedInteger('deviceId');
            $table->foreign('deviceId')->references('deviceId')->on('devices');
            $table->unsignedInteger('serviceId');
            $table->foreign('serviceId')->references('serviceId')->on('services');
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
        Schema::dropIfExists('device_details');
    }
}
