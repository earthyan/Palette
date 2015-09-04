<?php namespace Palette\Http\Controllers;

use Auth;

class HomeController extends Controller {
  public function __construct(){
    $this->middleware('auth', ['except' => 'link']);
  }

  public function home(){
    $used = round(Auth::user()->disk_used/1024, 4);
    $total = Auth::user()->disk_total;
    $percent = round(($used / $total) * 100, 2);
    $data = [
      'used' => $used,
      'total' => $total,
      'percent' => $percent
    ];

    return view('home')->withData($data);
  }

  public function link($file){
    list($uuid, $ext) = explode('.', $file);
    $image = \Palette\Images::where('uuid', $uuid)->where('ext', $ext)->first();

    if(count($image) < 1){
      header('Content-type: image/png');
      readfile(__DIR__.'/../../../public/assets/img/default.png');
    }

    header('Content-type: image/'.$ext);
    $imgDir = __DIR__.'/../../../uploads/'.$image->dir;
    $imgPath = $imgDir.'/'.$image->filename;
    readfile($imgPath);
  }
}
