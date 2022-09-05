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
        Schema::create('order_item', function (Blueprint $table) {
            $table->increments('order_item_id');
            $table->integer('order_id');
            $table->integer('product_id');
            $table->string('order_item_name');
            $table->string('order_item_description');
            $table->binary('order_item_image');
            $table->integer('order_item_quantity');
            $table->double('order_item_price');
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
        Schema::dropIfExists('order_item');
    }
};
