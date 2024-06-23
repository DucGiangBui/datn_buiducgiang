<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoPrintCardsTable extends Migration
{
    public function up()
    {
        Schema::create('info_print_cards', function (Blueprint $table) {
            $table->id('info_print_id');
            $table->string('name');
            $table->string('position');
        });
    }

    public function down()
    {
        Schema::dropIfExists('info_print_cards');
    }
}

