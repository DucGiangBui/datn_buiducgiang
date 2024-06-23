<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemplateCardsTable extends Migration
{
    public function up()
    {
        Schema::create('template_cards', function (Blueprint $table) {
            $table->id('template_id');
            $table->string('template_url');
            $table->string('description')->nullable();
            $table->decimal('cost', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('template_cards');
    }
}
