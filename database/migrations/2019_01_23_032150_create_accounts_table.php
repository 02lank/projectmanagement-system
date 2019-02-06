<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('account_id');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('user_id')->on('UserTypes');
            $table->unsignedInteger('accountinfo_id');
            $table->foreign('accountinfo_id')->references('accountinfo_id')->on('AccountInfos');
            $table->unsignedInteger('team_id');
            $table->foreign('team_id')->references('team_id')->on('teams');
            $table->string('username')->unique();
            $table->string('password');
            $table->timestamps();
            $table->softDeletes();
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
