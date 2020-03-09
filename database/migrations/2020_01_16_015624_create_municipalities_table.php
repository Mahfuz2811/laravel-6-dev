<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMunicipalitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('geo_municipalities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
			$table->string('name_bn')->nullable();
			$table->string('bbs_code');
			$table->string('division_bbs_code');
			$table->bigInteger('division_id')->unsigned();
			$table->string('district_bbs_code');
			$table->bigInteger('district_id')->unsigned();
			$table->string('upazila_bbs_code');
			$table->bigInteger('upazila_id')->unsigned();
            $table->foreign('division_id')->references('id')->on('geo_divisions')->onDelete('cascade')->onUpdate('cascade');
			$table->foreign('district_id')->references('id')->on('geo_districts')->onDelete('cascade')->onUpdate('cascade');
			$table->foreign('upazila_id')->references('id')->on('geo_upazilas')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('geo_municipalities');
    }
}
