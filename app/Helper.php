<?php namespace Palette;

use Cache;

class Helper {
  static public function getTitle(){
    return Cache::get('title', function (){
      return Setting::get('title');
    });
  }
  static public function getSubtitle(){
    return Cache::get('subtitle', function (){
      return Setting::get('subtitle');
    });
  }
}
