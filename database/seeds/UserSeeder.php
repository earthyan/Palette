<?php

use Illuminate\Database\Seeder;
use Palette\Services\Registrar;

class UserSeeder extends Seeder {
  public function run(){
    $data = [
      'email' => 'admin@admin.com',
      'password' =>'123456',
      'name' => 'admin',
      'group' => '1'
    ];
    $register = new Registrar();
    $register->create($data);
  }
}
