<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id('order_id');
            $table->string('status');
            $table->timestamp('order_at');
            $table->unsignedBigInteger('template_id')->nullable();
            $table->unsignedBigInteger('order_info_id');

            $table->foreign('template_id')->references('template_id')->on('template_cards');
            $table->foreign('order_info_id')->references('order_info_id')->on('order_infos')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
