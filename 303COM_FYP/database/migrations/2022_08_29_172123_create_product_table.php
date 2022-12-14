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
        Schema::create('product', function (Blueprint $table) {
            $table->increments('product_id');
            $table->integer('category_id')->unsigned()->default(0);
            $table->foreign('category_id')->references('category_id')->on('category')->onDelete('cascade');
            $table->string('product_name');
            $table->string('product_description');
            $table->binary('product_image');
            $table->integer('product_stock');
            $table->double('product_price');
            $table->integer('product_sale');
            $table->boolean('product_status');
            $table->boolean('category_status');
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
        Schema::dropIfExists('product');
    }
};
