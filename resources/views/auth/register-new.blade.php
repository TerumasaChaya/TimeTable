<!DOCTYPE html>
<html lang="en">
<head>
    <title>register</title>
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
            <form action="{{ url('/register') }}" class="form-horizontal" method="POST" role="form">
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
                                アカウント登録</h1>
                            <br />

                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">名前</label>

                        <div class="col-md-6">
                            <div class="input-icon right">
                                <i class="fa fa-user"></i>
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">
                            </div>

                            @if ($errors->has('name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label">
                            メールアドレス:</label>
                        <div class="col-md-6">
                                <input id="email" type="email" placeholder="" class="form-control" name="email" value="{{ old('email') }}"/>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="col-md-4 control-label">パスワード：</label>

                        <div class="col-md-6">
                            <div class="input-icon right">
                                <i class="fa fa-lock"></i>
                                <input id="password" type="password" class="form-control" name="password">
                            </div>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <label for="password-confirm" class="col-md-4 control-label">パスワード再入力：</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('class') ? ' has-error' : '' }}">
                        <label for="class" class="col-md-4 control-label">クラス：</label>

                        <div class="col-md-6">
                            <!--<input id="class" type="text" class="form-control" name="class" value="{{ old('class') }}"> -->
                            <select name="class">
                                @foreach(\App\class_table::orderBy('className')->get() as $class )
                                    <option value="{{$class->id}}">{{$class->className}}</option>
                                @endforeach
                            </select>

                            @if ($errors->has('class'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('class') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group mbn">
                        <div class="col-lg-12" align="right">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-btn fa-user"></i> 登録
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