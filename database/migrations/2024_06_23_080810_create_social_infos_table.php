<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialInfosTable extends Migration
{
    public function up()
    {
        Schema::create('social_infos', function (Blueprint $table) {
            $table->id('social_id');
            $table->string('platform');
            $table->string('social_icon');
            $table->string('social_url');
            $table->integer('number')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('social_infos');
    }
}

