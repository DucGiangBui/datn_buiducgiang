<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_social_infos', function (Blueprint $table) {
            $table->id('user_social_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('social_id');
            $table->string('social_url');
            $table->integer('number')->nullable();
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->foreign('social_id')->references('social_id')->on('social_infos')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_social_infos');
    }
};
