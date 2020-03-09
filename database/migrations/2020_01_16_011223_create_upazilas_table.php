<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUpazilasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('geo_upazilas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
			$table->string('name_bn')->nullable();
			$table->string('bbs_code');
			$table->bigInteger('division_id')->unsigned();
			$table->bigInteger('district_id')->unsigned();
            $table->foreign('division_id')->references('id')->on('geo_divisions')->onDelete('cascade')->onUpdate('cascade');
			$table->foreign('district_id')->references('id')->on('geo_districts')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('geo_upazilas');
    }
}
