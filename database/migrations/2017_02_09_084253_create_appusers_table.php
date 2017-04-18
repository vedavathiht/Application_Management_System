<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppusersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appusers', function (Blueprint $table) {
            $table->increments('appuser_id');
            $table->string('appuser_name');
            $table->string('appuser_email')->unique();
            $table->string('appuser_on');
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
        Schema::drop('appusers');
    }
}
