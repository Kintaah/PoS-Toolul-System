<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('points', function (Blueprint $table) {
            $table->integer('member_id');
            $table->integer('amount');
            $table->timestamp('get_point_at');
            $table->integer('status_id');

            // $table->foreign('member_id')->references('member_id')->on('members');
            // $table->foreign('status_id')->references('status_id')->on('points_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('points');
    }
}
