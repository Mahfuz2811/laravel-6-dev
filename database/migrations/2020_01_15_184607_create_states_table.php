<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('geo_states', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
			$table->string('state_code');
			$table->string('country_code');
			$table->bigInteger('country_id')->unsigned();
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
        Schema::dropIfExists('geo_states');
    }
}
