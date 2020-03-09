<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
			$table->longText('slug')->nullable();
			$table->longText('description')->nullable();
            $table->datetime('start_date')->nullable();
            $table->datetime('end_date')->nullable();
			$table->bigInteger('event_category_id')->unsigned();
            $table->foreign('event_category_id')->references('id')->on('cms_event_categories')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cms_events');
    }
}
