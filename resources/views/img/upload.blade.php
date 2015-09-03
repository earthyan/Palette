@extends('layouts.app')

@section('content')
  <ol class="breadcrumb">
    <li><a href="/home"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
    <li>图片</li>
    <li class="active">上传</li>
  </ol>

  @if(session('error'))
  <div class="alert alert-danger" role="alert">
    <strong>错误提示</strong>
    <p>{{ session('error') }}</p>
  </div>
  @endif

  <div class="col-md-6 col-md-offset-3">
    <form class="form-horizontal" method="POST" action="/img/upload" enctype="multipart/form-data">
      {!! csrf_field() !!}
      <div class="form-group">
        <label class="col-sm-2 control-label">选择文件</label>
        <div class="col-sm-10">
          <input type="file" name="image" class="form-control">
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-primary">上传</button>
        </div>
      </div>
    </form>
  </div>
@endsection
