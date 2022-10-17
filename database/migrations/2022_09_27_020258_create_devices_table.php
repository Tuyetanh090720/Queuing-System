<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devices', function (Blueprint $table) {
            $table->increments('deviceId');
            $table->string('deviceName');
            $table->string('deviceAddressIp');
            $table->unsignedInteger('deviceTypeId');
            $table->foreign('deviceTypeId')->references('deviceTypeId')->on('device_types');
            $table->string('deviceActiveST');
            $table->string('deviceConnectST');
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
        Schema::dropIfExists('devices');
    }
}
