<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_details', function (Blueprint $table) {
            $table->increments('payment_details_id');
            $table->integer('order_id')->unsigned()->default(0);
            $table->foreign('order_id')->references('order_id')->on('order')->onDelete('cascade');
            $table->double('payment_total');
            $table->string('payment_currency');
            $table->string('payment_method');
            $table->string('payment_transaction');
            $table->string('payment_status');
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
        Schema::dropIfExists('payment_details');
    }
};
