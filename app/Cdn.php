<?php namespace Palette;

use Illuminate\Database\Eloquent\Model;

class Cdn extends Model {
  protected $table = 'cdn';
  protected $primaryKey = 'id';
  protected $fillable = ['name', 'url'];

  static public function getList(){
    return self::get();
  }
}
