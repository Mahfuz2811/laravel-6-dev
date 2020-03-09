<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('order_id')->unsigned();
            $table->string('order_number')->nullable();
            $table->bigInteger('enroll_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->string('val_id')->nullable();
            $table->double('amount')->nullable();
            $table->double('store_amount')->nullable();
            $table->string('card_type')->nullable();
            $table->string('card_no')->nullable();
            $table->string('bank_tran_id')->nullable();
            $table->string('status')->nullable();
            $table->string('tran_date')->nullable();
            $table->string('currency')->nullable();
            $table->string('card_issuer')->nullable();
            $table->string('card_brand')->nullable();
            $table->string('card_issuer_country')->nullable();
            $table->string('card_issuer_country_code')->nullable();
            $table->string('store_id')->nullable();
            $table->longText('verify_sign')->nullable();
            $table->longText('verify_key')->nullable();
            $table->longText('verify_sign_sha2')->nullable();
            $table->string('currency_type')->nullable();
            $table->double('currency_amount')->nullable();
            $table->double('currency_rate')->nullable();
            $table->double('base_fair')->nullable();
            $table->string('value_a')->nullable();
            $table->string('value_b')->nullable();
            $table->string('value_c')->nullable();
            $table->string('value_d')->nullable();
            $table->string('risk_level')->nullable();
            $table->string('risk_title')->nullable();
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
        Schema::dropIfExists('payment_infos');
    }
}
