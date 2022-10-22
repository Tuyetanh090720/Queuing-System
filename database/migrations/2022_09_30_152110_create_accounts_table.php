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
            $table->string('accountLogin')->unique();
            $table->string('password');
            $table->string('accountPhone');
            $table->string('accountEmail')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('accountActiveST');
            $table->unsignedInteger('rightId');
            $table->foreign('rightId')->references('rightId')->on('rights');
            $table->rememberToken();
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
