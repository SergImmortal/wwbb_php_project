<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });

        DB::table('users_statuses')->insert(
            array(
                'name' => 'enabled'
            )
        );

        DB::table('users_statuses')->insert(
            array(
                'name' => 'disabled'
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
        Schema::dropIfExists('users_statuses');
    }
}
