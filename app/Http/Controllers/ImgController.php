<?php namespace Palette\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class ImgController extends Controller {
  public function getUpload(){
    return view('img.upload');
  }

  public function postUpload(Request $request){
    $file = $request->file('image');
    if(!$request->hasFile('image') || !$file->isValid()){
      return redirect()->to('/');
    }

    $path = $file->getRealPath();
    $name = $file->getClientOriginalName();
    $extension = $file->getClientOriginalExtension();
    $size = $file->getSize();

    $maxSize = 1024 * 1024 * 4;
    $extList = ['jpg', 'jpeg', 'png', 'gif'];

    if($size > $maxSize){
      session()->flash('error', '超过文件大小限制：4 MB');
      return redirect()->back();
    }

    if(!in_array($extension, $extList)){
      session()->flash('error', '仅允许 jpg, jpeg, png, gif 图片上传');
      return redirect()->back();
    }

    $dirName = date('Y/m');
    $destinationPath = __DIR__.'/../../../uploads/'.$dirName.'/';
    $uuid = substr(md5(time().rand(1, 9)), 8, 16);
    $fileName = md5($uuid.rand(1,9)).'.'.$extension;
    $file->move($destinationPath, $fileName);

    $image = new \Palette\Images;
    $image->uuid = $uuid;
    $image->uid = Auth::user()->id;
    $image->name = $name;
    $image->dir = $dirName;
    $image->filename = $fileName;
    $image->ext = $extension;
    $image->size = $size;
    $image->save();

    session()->flash('success', '图片上传成功');
    return redirect()->to('img/list');
  }
}
