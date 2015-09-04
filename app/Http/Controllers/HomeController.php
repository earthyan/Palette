<?php namespace Palette\Http\Controllers;

class HomeController extends Controller {
  public function __construct(){
    $this->middleware('auth', ['except' => 'link']);
  }

  public function home(){
    return view('home');
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
