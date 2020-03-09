<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGalleryPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_gallery_photos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
			$table->longText('slug')->nullable();
			$table->longText('description')->nullable();
			$table->bigInteger('gallery_category_id')->unsigned();
            $table->foreign('gallery_category_id')->references('id')->on('cms_gallery_categories')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cms_gallery_photos');
    }
}
