<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkstationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workstations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('manufacturer_name');
            $table->string('ip_address');
            $table->string('mac_address');
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
        Schema::drop('workstations');
    }
}
