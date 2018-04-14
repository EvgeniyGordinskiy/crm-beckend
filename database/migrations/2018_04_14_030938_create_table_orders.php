<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
           $table->increments('id');
           $table->integer('client_id');
           $table->foreign('client_id')->references('id')->on('clients');
           $table->float('amount');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders',  function (Blueprint $table) {
            $table->dropForeign(['client_id']);
        });
        Schema::drop('orders');
    }
}
