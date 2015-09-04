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

    $user = \Palette\User::find(Auth::user()->id);
    $user->disk_used += $image->size;
    $user->save();

    session()->flash('success', '图片上传成功');
    return redirect()->to('img/list');
  }

  public function getList(){
    $data = \Palette\Images::where('uid', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(30);
    return view('img.list')->withImages($data);
  }

  public function getDetail($pid){
    $image = \Palette\Images::where('id', $pid)->where('uid', Auth::user()->id)->first();

    if(count($image) < 1){
      session()->flash('error', '没有这张图片或这张图片不属于你');
      return redirect()->back();
    }

    $cdns = \Palette\Cdn::getList();

    return view('img.detail')->withImage($image)->withCdns($cdns);
  }
}
