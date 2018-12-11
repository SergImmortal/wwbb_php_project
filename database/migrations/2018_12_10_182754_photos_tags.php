<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PhotosTags extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos_tags', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('photo_id')->unsigned()->nullable();
            $table->foreign('photo_id')
                ->references('id')
                ->on('photos')
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
        Schema::dropIfExists('photos_tags');
    }
}
