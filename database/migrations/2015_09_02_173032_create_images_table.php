<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up(){
    Schema::create('images', function (Blueprint $table) {
      $table->increments('id');
      $table->string('uuid');
      $table->integer('uid');
      $table->string('name');
      $table->string('dir');
      $table->string('filename');
      $table->string('ext');
      $table->integer('size');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down(){
    Schema::drop('images');
  }
}
