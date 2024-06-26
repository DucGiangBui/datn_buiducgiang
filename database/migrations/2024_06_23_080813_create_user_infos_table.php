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
            $table->unsignedBigInteger('user_id');
            $table->string('position');
            $table->string('company');
            $table->string('address');
            $table->string('avatar_url');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_infos');
    }
}

