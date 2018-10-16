<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChatsMembersRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chats_members_roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });

        DB::table('chats_members_roles')->insert(
            array(
                'name' => 'owner'
            )
        );

        DB::table('chats_members_roles')->insert(
            array(
                'name' => 'member'
            )
        );

        DB::table('chats_members_roles')->insert(
            array(
                'name' => 'deleted_member'
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chats_members_roles');
    }
}
