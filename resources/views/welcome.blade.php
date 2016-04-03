<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
        </style>
    </head>
    <body>
            <nav class="navbar navbar-default">
                <div class="container">
                    <a class="navbar-brand" id="logo" href="">
                        Laravel Demo
                    </a>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right hidden-sm">
 
                            @if(Auth::check())
                                  <li><a href="{{ url('home') }}">ダッシュボード</a></li>
                            @endif
                            @if(Auth::guest())
                                  <li><a href="{{ url('auth/login') }}">ログイン</a></li>
                            @endif
                            @if(Auth::guest())
                                  <li><a href="{{ url('auth/register') }}">サインアップ</a></li>
                            @endif
                            @if(Auth::check())
                                  <li><a href="{{ url('auth/logout') }}">ログアウト</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </nav>
        <div class="container">
            <div class="content">
                <div class="title">Laravel 5</div>
            </div>
        </div>
    </body>
</html>
