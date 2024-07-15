<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialInfosTable extends Migration
{
    public function up()
    {
        Schema::create('social_infos', function (Blueprint $table) {
            $table->bigIncrements('social_id');
            $table->string('platform');
            $table->string('social_icon');
            $table->timestamps();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    public function down()
    {
        Schema::dropIfExists('social_infos');
    }
}

