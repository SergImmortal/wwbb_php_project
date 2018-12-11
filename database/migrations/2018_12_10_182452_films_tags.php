<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FilmsTags extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('films_tags', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('film_id')->unsigned()->nullable();
            $table->foreign('film_id')
                ->references('id')
                ->on('films')
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
        Schema::dropIfExists('films_tags');
    }
}
