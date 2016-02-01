<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostlistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postlists', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('user_id');
          $table->string('textarea',100);
          $table->timestamps();
          $table->tinyInteger('del_flg');     
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('postlists');
    }
}
