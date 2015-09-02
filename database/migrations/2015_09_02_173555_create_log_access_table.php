<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogAccessTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up(){
    Schema::create('log_access', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('pid');
      $table->string('ip', 16);
      $table->integer('transfer');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down(){
    Schema::drop('log_access');
  }
}
