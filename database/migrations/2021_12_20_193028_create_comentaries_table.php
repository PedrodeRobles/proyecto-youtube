<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComentariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentaries', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('user_id')->unsigned();
            
            $table->text('comentary')->nullable();

            $table->timestamps();

            //$table->foreign('video_id')->references('id')->on('videos');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comentaries');
    }
}
