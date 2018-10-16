<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChatsMesagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chats_messages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('members_id')->unsigned();
            $table->foreign('members_id')
                ->references('id')
                ->on('chats_members')
                ->onDelete('restrict')
                ->onUpdate('cascade');
            $table->longText('text');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chats_mesages');
    }
}
