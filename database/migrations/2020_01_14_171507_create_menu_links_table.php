<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_menu_links', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->longText('slug')->nullable();
			$table->longText('description')->nullable();
			$table->string('icon')->nullable();
			$table->string('url')->nullable();
			$table->bigInteger('parent_id')->unsigned()->nullable();
			$table->bigInteger('menu_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cms_menu_links');
    }
}
