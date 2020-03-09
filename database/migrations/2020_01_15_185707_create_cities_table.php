<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('geo_cities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
			$table->string('state_code');
			$table->bigInteger('state_id')->unsigned();
			$table->string('country_code');
			$table->bigInteger('country_id')->unsigned();
			$table->string('latitude');
			$table->string('longitude');
            $table->foreign('state_id')->references('id')->on('geo_states')->onDelete('cascade')->onUpdate('cascade');
			$table->foreign('country_id')->references('id')->on('geo_countries')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('geo_cities');
    }
}
