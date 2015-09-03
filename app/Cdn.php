<?php namespace Palette;

use Illuminate\Database\Eloquent\Model;

class Cdn extends Model {
  protected $table = 'cdn';
  protected $primaryKey = 'id';
  protected $fillable = ['url'];

  static public function getList(){
    $list = [];
    foreach(self::select() as $cdn){
      $list[] = $cdn->url;
    }
    return $list;
  }
}
