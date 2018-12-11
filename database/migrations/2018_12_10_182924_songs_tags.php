<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SongsTags extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('songs_tags', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('song_id')->unsigned()->nullable();
            $table->foreign('song_id')
                ->references('id')
                ->on('songs')
                ->onDelete('SET NULL')
                ->onUpdate('CASCADE');
            $table->integer('tag_id')->unsigned()->nullable();
            $table->foreign('tag_id')
                ->references('id')
                ->on('tags')
                ->onDelete('SET NULL')
                ->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('songs_tags');
    }
}
