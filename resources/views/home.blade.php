@extends('layouts.app')

@section('content')
  <ol class="breadcrumb">
    <li><a href="/home"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
    <li class="active">首页</li>
  </ol>

  <div class="col-md-12">
    <h1>欢迎使用 {{ \Palette\Helper::getTitle() }}！</h1>
    <hr>
    <h4>您已经使用的空间：{{ $data['used'] }}/{{ $data['total'] }} MB</h4>
    <div class="progress">
      <div class="progress-bar" role="progressbar" aria-valuenow="{{ $data['percent'] }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $data['percent'] }}%;">
        {{ $data['percent'] }}%
      </div>
    </div>
  </div>
@endsection
