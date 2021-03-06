<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoticesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_notices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
			$table->longText('slug')->nullable();
			$table->longText('description')->nullable();
			$table->bigInteger('notice_category_id')->unsigned();
            $table->foreign('notice_category_id')->references('id')->on('cms_notice_categories')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cms_notices');
    }
}
