<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <title>{{ \Palette\Helper::getTitle() }}</title>
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
  </head>
  <body>
    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/home">{{ \Palette\Helper::getTitle() }}</a>
        </div>

        <div class="collapse navbar-collapse" id="navbar-collapse">
          <ul class="nav navbar-nav">
            @if (Auth::check())
            <li @if(Request::is('home')) class="active" @endif><a href="/home">首页</a></li>
            <li @if(Request::is('img/list*')) class="active" @endif><a href="/img/list">列表</a></li>
            <li @if(Request::is('img/upload')) class="active" @endif><a href="/img/upload">上传</a></li>
            @endif
          </ul>
          <ul class="nav navbar-nav navbar-right">
            @if (Auth::check())
            <li><a>{{ Auth::user()->name }}</a></li>
            <li><a href="/auth/logout">退出</a></li>
            @else
            <li @if(Request::is('auth/register')) class="active" @endif><a href="/auth/register">注册</a></li>
            <li @if(Request::is('auth/login')) class="active" @endif><a href="/auth/login">登录</a></li>
            @endif
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container -->
    </nav>

    <div class="container">
      @yield('content')
    </div>

    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
  </body>
</html>
