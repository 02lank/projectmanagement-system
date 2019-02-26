<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('project_id');
            $table->unsignedInteger('account_id')->nullable($value = true);
            $table->foreign('account_id')->references('account_id')->on('accounts');
            $table->unsignedInteger('team_id')->nullable($value = true);
            $table->foreign('team_id')->references('team_id')->on('teams');
            $table->string('name', 70);
            $table->string('description');
            $table->string('status', 7);
            $table->date('deadline');
            $table->timestamps()
            ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
