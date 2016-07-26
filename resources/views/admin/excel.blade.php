@extends('admin.elements.basic')

@section('title')
    データーベース追加
@endsection

@section('content-header')
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header">
            <div class="page-title mrm">
                データーベース追加
            </div>
        </div>
        <hr/>
        <ol class="breadcrumb page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>&nbsp;<a href="/admin/excel">データーベース追加</a>&nbsp;&nbsp;
            </li>
            <li>
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
                データーベース追加</div>
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
                        <div class="panel panel-green">
                            <div class="panel-heading">データーベース追加</div>
                            <div class="panel-body">
                                <table  border="0">
                                    <tr>
                                        <td colspan="2"><div class="alert alert-info"><b>当サイトの元となるExcelデータをアップロードします</br>アップロードするデータを選択し、実行ボタンをクリックしてください</b></div></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><div class="alert alert-danger"><b>アップロードには5分程時間が掛かるため、実行ボタンを押した後ページを切り替えないでください</br>アップロードが完了すると自動でページが切り替わります</b></div></td>
                                    </tr>

                                    <form action="/admin/upload" method="post" enctype="multipart/form-data" class="col-lg-8">
                                        <td width="90%"><input type="file" name="upfile" size="30" /></td>
                                        <td width="10%"><input type="submit" class="btn btn-green" value="実行" /></td>
                                    </form>
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