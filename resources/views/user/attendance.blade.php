@extends('user.elements.basic')

@section('title')
    出席照会
@endsection

@section('content-header')
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header">
            <div class="page-title mrm">
                出席照会</div>
            <div class="page-subtitle">
                学籍番号入力ページ
            </div>
        </div>
        <hr />
        <ol class="breadcrumb page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>&nbsp;<a href="index.html">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li><a href="#">出席照会</a>&nbsp;&nbsp;
        </ol>
        <div class="clearfix">
        </div>
    </div>
    <!--END TITLE & BREADCRUMB PAGE-->
@endsection

@section('content')

    <div class="page-content">
        <div id="tab-general">
            <div class="row mbl">
                <div class="col-lg-12">

                    <div class="col-md-12">
                        <div id="area-chart-spline" style="width: 100%; height: 300px; display: none;">
                        </div>
                    </div>

                </div>

                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-green">
                                <div class="panel-heading">
                                    学生番号・パスワード入力フォーム</div>
                                <div class="panel-body pan">
                                    <form action="/user/attendance/show" method="POST">
                                        <input name="_token" type="hidden" value="{{csrf_token()}}">
                                        <div class="form-body pal">
                                            <div class="row">
                                                <div class="col-md-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label for="inputName" class="control-label">
                                                            学籍番号</label>
                                                        <div class="input-icon right">
                                                            <i class="fa fa-user"></i>
                                                            <input id="number" name="number" type="text" placeholder="" class="form-control text-right" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label for="inputEmail" class="control-label">
                                                            パスワード</label>
                                                        <div class="input-icon right">
                                                            <i class="fa fa-key"></i>
                                                            <input id="pass" type="password" name="pass" placeholder="" class="form-control text-right" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions text-right pal">
                                            <button type="submit" class="btn btn-primary">
                                                送信
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            @if($errors->has())
                                <div class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        <div>{{ $error }}</div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--END CONTENT-->
@endsection

@section('page-js')
    <script type="text/javascript">

    </script>
@endsection