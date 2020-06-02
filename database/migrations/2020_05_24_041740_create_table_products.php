<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name')->nullable();
            $table->text('product_description')->nullable();
            $table->float('price');
            $table->float('sale_price');
            $table->tinyInteger('new')->default('2')->index();//sap xep theo thu tu tang dan
            $table->tinyInteger('status')->default('1')->index();//1 la an 2 la hien
            $table->text('ingredient');
            $table->unsignedBigInteger('id_type');
            $table->timestamps();

            $table->foreign("id_type")->references('id')->on('type_products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
