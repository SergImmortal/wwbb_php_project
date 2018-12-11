<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MineStyles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mine_styles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('style_name', '50');
            $table->string('color_1', '20')->nullable();
            $table->string('color_2', '20')->nullable();
            $table->string('color_3', '20')->nullable();
            $table->string('color_4', '20')->nullable();
            $table->string('color_5', '20')->nullable();
            $table->string('color_6', '20')->nullable();
            $table->boolean('is_active')->default('0');
            $table->text('meta_tags')->nullable();
            $table->text('meta_desc')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mine_styles');
    }
}
