
<!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Login</title>
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
                <form action="{{ url('/profile') }}" class="form-horizontal" method="POST" role="form">
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
                                    登録情報</h1>
                                <br />

                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">名前</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{{ old('name',  Auth::user()->name) }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Eメール</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ old('email',  Auth::user()->email ) }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('class') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">クラス</label>

                            <div class="col-md-6">
                                {{--<input type="text" class="form-control" name="email" value="{{ old('class',  Auth::user()->class ) }}">--}}

                                <select name="class">
                                    @foreach(\App\class_table::all() as $class )

                                        @if($class->id == Auth::user()->class )
                                            <option value="{{$class->id}}" selected="selected">{{$class->className}}</option>
                                        @else
                                            <option value="{{$class->id}}">{{$class->className}}</option>
                                        @endif


                                    @endforeach
                                </select>

                                @if ($errors->has('class'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('class') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    保存
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