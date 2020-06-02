<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableOrderDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_detail', function (Blueprint $table) {
//            $table->id();
            $table->integer('quantity')->nullable();
            $table->float('price');
            $table->unsignedBigInteger('id_product');
            $table->unsignedBigInteger('id_order');
            $table->timestamps();

            $table->foreign('id_product')->references('id')->on('products');
            $table->foreign('id_order')->references('id')->on('orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_detail');
    }
}
