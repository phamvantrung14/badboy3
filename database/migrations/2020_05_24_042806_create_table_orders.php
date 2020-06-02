<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_name')->nullable();
            $table->tinyInteger('gender')->default('1')->index();
            $table->string('email');
            $table->string('address')->nullable();
            $table->integer('phone_number');
            $table->text('note');
            $table->float('total_price');
            $table->tinyInteger('payment')->default('1')->index();//1 chuyen khoan 2. tien mat
            $table->tinyInteger('status')->default('1')->index();//1 dang cho -2 dang giao -3 hoan thanh -4 huy don


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
        Schema::dropIfExists('orders');
    }
}
