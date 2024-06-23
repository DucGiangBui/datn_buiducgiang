<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentHistoriesTable extends Migration
{
    public function up()
    {
        Schema::create('payment_histories', function (Blueprint $table) {
            $table->id('payment_id');
            $table->timestamp('payment_at');
            $table->decimal('cost', 10, 2);

        });
    }

    public function down()
    {
        Schema::dropIfExists('payment_histories');
    }
}

