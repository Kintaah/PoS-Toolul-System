<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_detail', function (Blueprint $table) {
            $table->increments('purchase_detail_id');
            $table->integer('purchase_id');
            $table->integer('product_id');
            $table->integer('buy_price');
            $table->integer('quantity');
            $table->integer('subtotal');
            $table->timestamps();

            // $table->foreign('purchase_id')->references('purchase_id')->on('purchase');
            // $table->foreign('product_id')->references('product_id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchase_detail');
    }
}
