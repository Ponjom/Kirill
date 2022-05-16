<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTracksTable extends Migration
{
    public function up()
    {
        Schema::create('tracks', function (Blueprint $table) {
            $table->id();
            $table->string('author');
            $table->string('name');
            $table->string('path');
            $table->unsignedBigInteger('album_id');
            $table->timestamps();

            $table->foreign('album_id')->references('id')->on('albums');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tracks');
    }
}
