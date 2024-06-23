<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserInfosTable extends Migration
{
    public function up()
    {
        Schema::create('user_infos', function (Blueprint $table) {
            $table->id('info_id');
            $table->unsignedBigInteger('social_id')->nullable();
            $table->string('position')->nullable();
            $table->string('company')->nullable();
            $table->string('address')->nullable();
            $table->string('avatar_url')->nullable();

            $table->foreign('social_id')->references('social_id')->on('social_infos')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_infos');
    }
}

