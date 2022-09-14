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
        Schema::create('order', function (Blueprint $table) {
            $table->increments('order_id');
            $table->integer('user_id')->unsigned()->default(0);
            $table->foreign('user_id')->references('user_id')->on('user')->onDelete('cascade');
            $table->string('order_status');
            $table->string('order_first_name');
            $table->string('order_last_name');
            $table->string('order_address_line1');
            $table->string('order_address_line2');
            $table->string('order_city');
            $table->string('order_postal_code');
            $table->string('order_country');
            $table->string('order_contact');
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
        Schema::dropIfExists('order');
    }
};
