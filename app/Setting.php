<?php namespace Palette;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model {
    protected $table = 'setting';
    protected $primaryKey = 'key';
    protected $fillable = ['key', 'value'];

    static public function get($key){
      return self::find($key)->value;
    }

    static public function set($key, $value){
      $setting = self::find($key);
      $setting->value = $value;
      $setting->save();
    }
}
