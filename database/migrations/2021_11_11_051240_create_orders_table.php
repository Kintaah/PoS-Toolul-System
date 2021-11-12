<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('order_id');
            $table->integer('member_id')->nullable();
            $table->integer('total_item');
            $table->integer('total_harga');
            $table->tinyInteger('discount')->default(0);
            $table->integer('method_id')->default(0);
            $table->integer('bayar')->default(0);
            $table->integer('diterima')->default(0);
            $table->integer('user_id');
            $table->timestamps();

            // $table->foreign('member_id')->references('member_id')->on('members');
            // $table->foreign('method_id')->references('method_id')->on('payment_method');
            // $table->foreign('user_id')->references('user_id')->on('users');
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
