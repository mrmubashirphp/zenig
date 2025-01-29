<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('product_id');
            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('product_id')->references('id')->on('products');
            $table->decimal('price', 8, 2)->nullable();
            $table->decimal('sst_percent', 5, 2)->nullable();
            $table->decimal('sst_value', 8, 2)->nullable();
            $table->integer('firm_qty')->nullable();
            $table->integer('forecast_qty_1')->nullable();
            $table->integer('forecast_qty_2')->nullable();
            $table->integer('forecast_qty_3')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('order_product');
    }
}
