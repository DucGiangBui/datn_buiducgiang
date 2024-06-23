<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderInfosTable extends Migration
{
    public function up()
    {
        Schema::create('order_infos', function (Blueprint $table) {
            $table->id('order_info_id');
            $table->string('name');
            $table->string('address');
            $table->string('phone');
            $table->unsignedBigInteger('payment_id')->nullable();
            $table->unsignedBigInteger('info_print_id')->nullable();

            $table->foreign('payment_id')->references('payment_id')->on('payment_histories')->onDelete('cascade');
            $table->foreign('info_print_id')->references('info_print_id')->on('info_print_cards')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_infos');
    }
}
