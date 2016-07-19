

@extends('admin.elements.basic')

@section('title')
    管理者登録
@endsection

@section('content-header')
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header">
            <div class="page-title mrm">
                管理者登録</div>
            <div class="page-subtitle">
                {{--ここにサブタイ--}}
            </div>
        </div>
        <hr />

        <form action="{{ url('/admin/register') }}" class="form-horizontal" method="POST" role="form">
            {{ csrf_field() }}
            <div class="form-body pal">

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



                <div class="form-group mbn">
                    <div class="col-lg-12" align="right">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-btn fa-user"></i> 登録
                        </button>
                    </div>
                </div>
            </div>
        </form>

        <ol class="breadcrumb page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>&nbsp;<a href="{{ url('/admin/home') }}">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li><a href="{{ url('/admin/register') }}">管理者登録</a>&nbsp;&nbsp;
        </ol>
        <div class="clearfix">
        </div>
    </div>
    <!--END TITLE & BREADCRUMB PAGE-->
@endsection



@section('page-js')
    <script type="text/javascript">

    </script>
@endsection