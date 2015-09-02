<?php

use Illuminate\Database\Seeder;

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
