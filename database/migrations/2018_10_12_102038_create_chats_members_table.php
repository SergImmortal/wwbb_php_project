<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChatsMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chats_members', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('chats_id')->unsigned();
            $table->foreign('chats_id')
                ->references('id')
                ->on('chats')
                ->onDelete('restrict')
                ->onUpdate('cascade');
            $table->integer('users_id')->unsigned();
            $table->foreign('users_id')
                ->references('id')
                ->on('users')
                ->onDelete('restrict')
                ->onUpdate('cascade');
            $table->integer('chats_members_roles_id')->unsigned();
            $table->foreign('chats_members_roles_id')
                ->references('id')
                ->on('chats_members_roles')
                ->onDelete('restrict')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('chats_members');
    }
}
