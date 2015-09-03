@extends('layouts.app')

@section('content')
  <ol class="breadcrumb">
    <li><a href="/home"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
    <li class="active">登录</li>
  </ol>

<div class="col-md-8 col-md-offset-2">
  <h1 class="text-center">登录</h1>
  <hr>

  @if(count($errors) > 0)
  <div class="alert alert-danger" role="alert">
    <strong>错误提示</strong>
    <ul>
      @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif

  <form class="form-horizontal col-md-offset-2" method="post" action="/auth/login">
    {!! csrf_field() !!}
    <div class="form-group">
      <label for="inputEmail" class="col-sm-2 control-label">Email</label>
      <div class="col-sm-7">
        <input type="email" name="email" class="form-control" id="inputEmail" placeholder="请输入 Email" value="{{ old('email') }}">
      </div>
    </div>
    <div class="form-group">
      <label for="inputPassword" class="col-sm-2 control-label">密码</label>
      <div class="col-sm-7">
        <input type="password" name="password" class="form-control" id="inputPassword" placeholder="请输入密码">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <div class="checkbox">
          <label>
            <input type="checkbox" name="remember"> 记住我
          </label>
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">登录</button>
      </div>
    </div>
  </form>
</div>
@endsection
