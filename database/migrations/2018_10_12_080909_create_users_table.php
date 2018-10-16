<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nickname')->unique();
            $table->string('email')->unique();
            $table->binary('password');
            $table->integer('users_roles_id')->unsigned();
            $table->foreign('users_roles_id')
                ->references('id')
                ->on('users_roles')
                ->onDelete('restrict')
                ->onUpdate('cascade');
            $table->integer('users_statuses_id')->unsigned();
            $table->foreign('users_statuses_id')
                ->references('id')
                ->on('users_statuses')
                ->onDelete('restrict')
                ->onUpdate('cascade');
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
