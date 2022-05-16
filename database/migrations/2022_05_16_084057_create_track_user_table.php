<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrackUserTable extends Migration
{
    public function up()
    {
        Schema::create('track_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('track_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('track_id')->references('id')->on('tracks')->cascadeOnDelete();
        });
    }

    public function down()
    {
        Schema::dropIfExists('track_user');
    }
}
