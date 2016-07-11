<!DOCTYPE html>
<html lang="en">
<head>
    <title>reset email</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,800italic,400,700,800">
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,700,300">
    <link type="text/css" rel="stylesheet" href="/design/styles/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="/design/styles/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="/design/styles/animate.css">
    <link type="text/css" rel="stylesheet" href="/design/styles/all.css">
    <link type="text/css" rel="stylesheet" href="/design/styles/main.css">
    <link type="text/css" rel="stylesheet" href="/design/styles/style-responsive.css">
</head>
<body style="background: url('/design/images/bg/bg.png') center center fixed;">
<div class="page-form">
    <div class="panel panel-blue">
        <div class="panel-body pan">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/password/email') }}">
                <!-- <form action="{{ url('/password/email') }}" class="form-horizontal" method="POST" role="form"> -->
                {{ csrf_field() }}

                <div class="form-body pal">
                    <div class="col-md-12 text-center">
                        <h1 style="margin-top: -90px; font-size: 48px;">
                            CarryCullam</h1>
                        <br />
                    </div>
                    <div class="form-group">
                        <div class="col-md-3">
                            <img src="/design/images/avatar/profile-pic.png" class="img-responsive" style="margin-top: -35px;" />
                        </div>
                        <div class="col-md-9 text-center">
                            <h1>
                                パスワードリセット</h1>
                            <h2>(管理者)</h2>
                            <br />

                        </div>
                    </div>
                    @if (session('status'))
                        <div class="alert alert-success">
                            メールアドレス宛にリセット用のURLを送信したぞ！
                        </div>
                    @endif

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label">メールアドレス</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group mbn">
                        <div class="col-lg-12" align="right">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-btn fa-envelope"></i> リセット用のURLを送信する
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
</body>
</html>
