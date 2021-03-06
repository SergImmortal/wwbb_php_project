<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Books extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title_ua', '100')->nullable();
            $table->string('title_en', '100')->nullable();
            $table->text('desk_ua')->nullable();
            $table->text('desk_en')->nullable();
            $table->text('quote_ua')->nullable();
            $table->text('quote_en')->nullable();
            $table->string('link', '300')->nullable();
            $table->string('path', '300')->nullable();
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
        Schema::dropIfExists('books');
    }
}
