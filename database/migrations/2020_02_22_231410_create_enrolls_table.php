<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnrollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrolls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('enrollable_id')->unsigned(); //polymorphic relationship
            $table->string('enrollable_type'); //polymorphic relationship with course/live class
            $table->integer('is_premium');
            $table->integer('fee');
            $table->integer('paid_amount');
            $table->string('discount');
            $table->timestamp('enrollment_date');
            $table->integer('enrollment_status')->default(0); // 0 means pending
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
        Schema::dropIfExists('enrolls');
    }
}
