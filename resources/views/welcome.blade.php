<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="kurotokiya">
    <title>{{ \Palette\Helper::getTitle() }}</title>
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/cover.css">
    <!--[if lt IE 9]>
      <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="site-wrapper">
      <div class="site-wrapper-inner">
        <div class="cover-container">
          <div class="masthead clearfix">
            <div class="inner">
              <h3 class="masthead-brand">{{ \Palette\Helper::getTitle() }}</h3>
            </div>
          </div>
          <div class="inner cover">
            <h1 class="cover-heading">{{ \Palette\Helper::getTitle() }}</h1>
            <p class="lead">{{ \Palette\Helper::getSubtitle() }}</p>
            <p class="lead">
              <a href="/auth/login" class="btn btn-lg btn-default">登录</a>
              <a href="/auth/register" class="btn btn-lg btn-default">注册</a>
            </p>
          </div>
          <div class="mastfoot">
            <div class="inner">
              <p>Powered by Palette by kurotokiya.</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
  </body>
</html>
