@extends('admin.elements.basic')

@section('title')
    データーベース削除
@endsection

@section('content-header')
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header">
            <div class="page-title mrm">
                データーベース削除
            </div>
        </div>
        <hr/>
        <ol class="breadcrumb page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>&nbsp;<a href="index.html">Home</a>&nbsp;&nbsp;<i
                        class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li><a href="#">データーベース削除</a>&nbsp;&nbsp;
        </ol>
        <div class="clearfix">
        </div>
    </div>
    <!--END TITLE & BREADCRUMB PAGE-->
@endsection

@section('content-header')
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header">
            <div class="page-title mrm">
                データーベース削除</div>
            {{--<div class="page-subtitle">--}}
                {{--ここにサブタイトルが入る--}}
            {{--</div>--}}
        </div>
        <hr />
        {{--<ol class="breadcrumb page-breadcrumb">--}}
            {{--<li>--}}
                {{--<i class="fa fa-home"></i>&nbsp;<a href="index.html">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>--}}
            {{--<li><a href="#">ここにタイトルが入る</a>&nbsp;&nbsp;--}}
        {{--</ol>--}}
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
                        <div class="panel panel-dark">
                            <div class="panel-heading">データーベース削除</div>
                            <div class="panel-body">
                                <table border="0">
                                    <tr>
                                        <td><div class="alert alert-info"><b>実行ボタンをクリックすると当サイトの元となるデータを格納したデータベースを削除します</b></div></td>
                                    </tr>
                                    <tr>
                                        <td><div class="alert alert-danger"><b>削除が完了すると自動でページが切り替わります</b></div></td>
                                    </tr>
                                    <tr>
                                    <td align="right">
                                        <form action="/admin/delete" method="post" enctype="multipart/form-data" class="col-lg-8">
                                        <input type="submit" value="実行" class="btn btn-dark"/>
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                        </form>
                                    </td>
                                    </tr>
                                </table>
                            </div>
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