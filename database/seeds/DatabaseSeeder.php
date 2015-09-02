<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Palette\Services\Registrar;

class DatabaseSeeder extends Seeder {
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run(){
    Model::unguard();

    $this->call(UserSeeder::class);
		$this->call(SystemSeeder::class);
  }
}

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

class SystemSeeder extends Seeder {
  public function run(){
    $config = [
      [
        'key' => 'title',
        'value' => 'Palette'
      ],
    ];
    DB::table('setting')->insert($config);
  }
}
