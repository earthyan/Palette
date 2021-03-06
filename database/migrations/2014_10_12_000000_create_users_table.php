<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up(){
    Schema::create('users', function (Blueprint $table) {
      $table->increments('id');
      $table->string('email', 64)->unique();
      $table->string('password', 60);
      $table->string('name');
      $table->integer('disk_used');
      $table->integer('disk_total');
      $table->string('group');
      $table->rememberToken();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down(){
    Schema::drop('users');
  }
}
