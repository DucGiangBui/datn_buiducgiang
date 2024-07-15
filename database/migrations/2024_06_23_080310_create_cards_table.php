<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardsTable extends Migration
{
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->bigIncrements('card_id');
            $table->string('card_url');
            $table->unsignedBigInteger('template_id')->nullable();
            $table->timestamps();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->foreign('template_id')->references('template_id')->on('template_cards');

        });
    }

    public function down()
    {
        Schema::dropIfExists('cards');
    }
}
