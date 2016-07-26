<!--
    {ユーザ}教師編集ビュー
    作成日:2016/7/19~2016/7/1
    作成者:村上 慧
-->

@extends('user.elements.basic')

@section('title')
    教師詳細
@endsection

@section('content-header')
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header">
            <div class="page-title mrm">
                教師詳細
            </div>
        </div>
        <hr/>
        <ol class="breadcrumb page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>&nbsp;<a href="/user/teacher">教師一覧</a>&nbsp;&nbsp;
                <i class="fa fa-angle-right"></i>&nbsp;&nbsp;
                <a href="#">教師詳細</a>&nbsp;&nbsp;
            </li>
            <li>
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

                <div class="panel panel-blue">
                    <div class="panel-heading">{{$teacher->TeacherName}}先生</div>
                    <div class="panel-body">
                        <table class="table table-hover table-bordered">
                            <div class="col-lg-2"class="col-md-6" class="col-xs-6">
                                <!-- 写真表示 -->
                                <img src="{{action(ImageController::class.'@teacherImage', ['name' => $teacher->fileName])}}"
                                     class="img-responsive" height="200" width="200">

                            </div>
                            <div class="col-lg-10" class="col-md-6" class="col-xs-6">
                                <!-- 名前 -->
                                <label>コメント</label><br>
                                <!-- コメント -->
                                <textarea name="comment" autofocus="autofocus" rows="10" cols="50" readonly>{{$teacher->comment}}</textarea><br>
                                <!-- 戻るボタン -->
                                <a href="/user/teacher"><input type="button" class="btn btn-xs btn-blue"
                                                                value="戻る"></a>
                            </div>
                        </table>
                    </div>
                </div>
                <!--END CONTENT-->
                <!--BEGIN FOOTER-->
                <div id="footer">
                    <div class="copyright">
                        <a href="http://themifycloud.com">2014 © KAdmin Responsive Multi-Purpose
                            Template</a></div>
                </div>
                <!--END FOOTER-->
            </div>
        </div>
    </div>
    <!--END CONTENT-->
@endsection

@section('page-js')
    <script type="text/javascript">

    </script>
@endsection