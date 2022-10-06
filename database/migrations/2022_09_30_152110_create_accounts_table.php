<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->increments('accountId');
            $table->string('accountName');
            $table->string('accountLogin');
            $table->string('accountPw');
            $table->string('accountPhone');
            $table->string('accountEmail');
            $table->string('accountActiveST');
            $table->unsignedInteger('rightId');
            $table->foreign('rightId')->references('rightId')->on('rights');
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
        Schema::dropIfExists('accounts');
    }
}
