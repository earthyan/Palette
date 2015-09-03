@extends('layouts.app')

@section('content')
  <ol class="breadcrumb">
    <li><a href="/home"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
    <li>图片</li>
    <li class="active">列表</li>
  </ol>

  @if(session('success'))
  <div class="alert alert-success" role="alert">
    <strong>提示</strong>
    <p>{{ session('success') }}</p>
  </div>
  @endif

  <div class="row">
    @if (count($images) > 0)
      @foreach($images as $image)
      <div class="col-lg-2 col-sm-3 col-xs-4">
        <a href="/img/detail/{{ $image->id }}">
          <img src="/link/{{ $image->uuid }}.{{ $image->ext }}" class="thumbnail img-responsive">
        </a>
      </div>
      @endforeach
    @else
    <div class="alert alert-info" role="alert">
      <strong>提示信息</strong>
      <p>还没有上传图片？赶快去 <a href="/img/upload">上传</a></p>
    </div>
    @endif
  </div>
@endsection
