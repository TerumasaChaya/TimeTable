<!--
    {管理者}教師編集ビュー
    作成日:2016/7/11~2016/7/12
    作成者:村上 慧
-->

@extends('admin.elements.basic')

@section('title')
    教師編集
@endsection

@section('content-header')
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header">
            <div class="page-title mrm">
                教師編集
            </div>
        </div>
        <hr/>
        <ol class="breadcrumb page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>&nbsp;<a href="index.html">Home</a>&nbsp;&nbsp;<i
                        class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li><a href="#">教師編集</a>&nbsp;&nbsp;
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
                    <div class="panel-heading">編集</div>
                    <div class="panel-body">
                        <table class="table table-hover table-bordered">
                            <div class="col-lg-2"class="col-md-6" class="col-xs-6">
                                <!-- 写真表示 -->
                                <img src="{{action(ImageController::class.'@teacherImage', ['name' => $teacher->fileName])}}"
                                     class="img-responsive" height="200" width="200">

                            </div>
                            <div class="col-lg-10" class="col-md-6" class="col-xs-6">
                                <!-- 名前 -->
                                <label>名前：{{$teacher->TeacherName}}</label><br>

                                <form action="/admin/teacher/upImg" method="post" enctype="multipart/form-data">
                                    <input type="hidden" value="{{$teacher->id}}" name="teacherId">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <!-- コメント -->
                                    <textarea name="comment" autofocus="autofocus" rows="10" cols="50">{{$teacher->comment}}</textarea><br>

                                    <!-- 写真アップロード -->
                                    写真編集<input type="file" name="upfile"><br>

                                    <!-- 完了ボタン -->
                                    <input type="submit" class="btn btn-xs btn-blue" value="完了">
                                </form>
                                <!-- 戻るボタン -->
                                <a href="/admin/teacher"><input type="button" class="btn btn-xs btn-blue"
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