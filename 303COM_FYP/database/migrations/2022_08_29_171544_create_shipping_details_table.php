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
        Schema::create('shipping_details', function (Blueprint $table) {
            $table->increments('shipping_details_id');
            $table->integer('user_id')->unsigned()->default(0);
            $table->foreign('user_id')->references('user_id')->on('user')->onDelete('cascade');
            $table->string('shipping_first_name');
            $table->string('shipping_last_name');
            $table->string('shipping_address_line1');
            $table->string('shipping_address_line2');
            $table->string('shipping_city');
            $table->string('shipping_postal_code');
            $table->string('shipping_country');
            $table->string('shipping_contact');
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
        Schema::dropIfExists('shipping_details');
    }
};
