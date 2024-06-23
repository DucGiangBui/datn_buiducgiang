<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardsTable extends Migration
{
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->id('card_id');
            $table->string('card_url');
            $table->unsignedBigInteger('template_id')->nullable();

            $table->foreign('template_id')->references('template_id')->on('template_cards');

        });
    }

    public function down()
    {
        Schema::dropIfExists('cards');
    }
}
