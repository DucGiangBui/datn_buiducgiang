<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('user_id');
            $table->string('username');
            $table->string('password');
            $table->string('name');
            $table->string('email');
            $table->tinyInteger('gender');
            $table->string('link_url');
            $table->unsignedBigInteger('card_id')->nullable();
            $table->unsignedBigInteger('info_id');

            $table->foreign('info_id')->references('info_id')->on('user_infos')->onDelete('cascade');
            $table->foreign('card_id')->references('card_id')->on('cards')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
