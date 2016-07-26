<!--
    {ユーザ}教師一覧ビュー
    作成日:2016/7/12~2016/7/
    作成者:村上 慧
-->

@extends('user.elements.basic')

@section('title')
    教師一覧
@endsection

@section('content-header')
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header">
            <div class="page-title mrm">
                教師一覧
            </div>
        </div>
        <hr/>
        <ol class="breadcrumb page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>&nbsp;<a href="/user/teacher">教師一覧</a>&nbsp;&nbsp;
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

                <!-- カレッジごとに6列表示 -->
                <div class="col-lg-12">
                    <div class="row">

                        <!-- IT -->
                        <div class="col-lg-2">
                            <div class="panel panel-grey">
                                <div class="panel-heading">IT</div>
                                <div class="panel-body">
                                    <table class="table table-hover table-bordered">
                                        <thead>
                                        <tr>
                                            <th class="text-center">写真</th>
                                            <th class="text-center">名前</th>
                                            <th class="text-center">詳細</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($it as $val)
                                            <tr>
                                                <td>
                                                    <img src="{{action(ImageController::class.'@teacherImage', ['name' => $val->fileName])}}"
                                                         class="img-responsive" height="100" width="100"></td>
                                                <td class="text-center"><span class="fa-5x">{{$val->TeacherName}}</span>
                                                </td>
                                                <td class="text-center"><a
                                                            href="teacher/detail/{{$val->id}}"><input type="button"
                                                                                                           class="btn btn-xs btn-grey"
                                                                                                           value="詳細"></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- ゲーム -->
                        <div class="col-lg-2">
                            <div class="panel panel-green">
                                <div class="panel-heading">デザイン</div>
                                <div class="panel-body">
                                    <table class="table table-hover table-bordered">
                                        <thead>
                                        <tr>
                                            <th class="text-center">写真</th>
                                            <th class="text-center">名前</th>
                                            <th class="text-center">詳細</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($game as $val)
                                            <tr>
                                                <td>
                                                    <img src="{{action(ImageController::class.'@teacherImage', ['name' => $val->fileName])}}"
                                                         class="img-responsive" height="100" width="100"></td>
                                                <td class="text-center"><span class="fa-5x">{{$val->TeacherName}}</span>
                                                </td>
                                                <td class="text-center"><a
                                                            href="teacher/detail/{{$val->id}}"><input type="button"
                                                                                                           class="btn btn-xs btn-green"
                                                                                                           value="詳細"></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- デザイン -->
                        <div class="col-lg-2">
                            <div class="panel panel-orange">
                                <div class="panel-heading">デザイン</div>
                                <div class="panel-body">
                                    <table class="table table-hover table-bordered">
                                        <thead>
                                        <tr>
                                            <th class="text-center">写真</th>
                                            <th class="text-center">名前</th>
                                            <th class="text-center">詳細</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($desi as $val)
                                            <tr>
                                                <td>
                                                    <img src="{{action(ImageController::class.'@teacherImage', ['name' => $val->fileName])}}"
                                                         class="img-responsive" height="100" width="100"></td>
                                                <td class="text-center"><span class="fa-5x">{{$val->TeacherName}}</span>
                                                </td>
                                                <td class="text-center"><a
                                                            href="teacher/detail/{{$val->id}}"><input type="button"
                                                                                                           class="btn btn-xs btn-orange"
                                                                                                           value="詳細"></a>
                                                </td>
                                            </tr>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- CG -->
                        <div class="col-lg-2">
                            <div class="panel panel-red">
                                <div class="panel-heading">CG</div>
                                <div class="panel-body">
                                    <table class="table table-hover table-bordered">
                                        <thead>
                                        <tr>
                                            <th class="text-center">写真</th>
                                            <th class="text-center">名前</th>
                                            <th class="text-center">詳細</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($cg as $val)
                                            <tr>
                                                <td>
                                                    <img src="{{action(ImageController::class.'@teacherImage', ['name' => $val->fileName])}}"
                                                         class="img-responsive" height="100" width="100"></td>
                                                <td class="text-center"><span class="fa-5x">{{$val->TeacherName}}</span>
                                                </td>
                                                <td class="text-center"><a
                                                            href="teacher/detail/{{$val->id}}"><input type="button"
                                                                                                           class="btn btn-xs btn-red"
                                                                                                           value="詳細"></a>
                                                </td>
                                            </tr>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- 英会話 -->
                        <div class="col-lg-2">
                            <div class="panel panel-violet">
                                <div class="panel-heading">英会話</div>
                                <div class="panel-body">
                                    <table class="table table-hover table-bordered">
                                        <thead>
                                        <tr>
                                            <th class="text-center">写真</th>
                                            <th class="text-center">名前</th>
                                            <th class="text-center">詳細</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($eng as $val)
                                            <tr>
                                                <td>
                                                    <img src="{{action(ImageController::class.'@teacherImage', ['name' => $val->fileName])}}"
                                                         class="img-responsive" height="100" width="100"></td>
                                                <td class="text-center"><span class="fa-5x">{{$val->TeacherName}}</span>
                                                </td>
                                                <td class="text-center"><a
                                                            href="teacher/detail/{{$val->id}}"><input type="button"
                                                                                                           class="btn btn-xs btn-violet"
                                                                                                           value="詳細"></a>
                                                </td>
                                            </tr>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- 教務&進路&新任 -->
                        <div class="col-lg-2">
                            <div class="panel panel-yellow">
                                <div class="panel-heading">教務　進路　新任</div>
                                <div class="panel-body">
                                    <table class="table table-hover table-bordered">
                                        <thead>
                                        <tr>
                                            <th class="text-center">写真</th>
                                            <th class="text-center">名前</th>
                                            <th class="text-center">詳細</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($kyo as $val)
                                            <tr>
                                                <td>
                                                    <img src="{{action(ImageController::class.'@teacherImage', ['name' => $val->fileName])}}"
                                                         class="img-responsive" height="100" width="100"></td>
                                                <td class="text-center"><span class="fa-5x">{{$val->TeacherName}}</span>
                                                </td>
                                                <td class="text-center"><a
                                                            href="teacher/detail/{{$val->id}}"><input type="button"
                                                                                                           class="btn btn-xs btn-yellow"
                                                                                                           value="詳細"></a>
                                                </td>
                                            </tr>
                                            </tr>
                                        @endforeach
                                        @foreach($sin as $val)
                                            <tr>
                                                <td>
                                                    <img src="{{action(ImageController::class.'@teacherImage', ['name' => $val->fileName])}}"
                                                         class="img-responsive" height="100" width="100"></td>
                                                <td class="text-center"><span class="fa-5x">{{$val->TeacherName}}</span>
                                                </td>
                                                <td class="text-center"><a
                                                            href="teacher/detail/{{$val->id}}"><input type="button"
                                                                                                           class="btn btn-xs btn-yellow"
                                                                                                           value="詳細"></a>
                                                </td>
                                            </tr>
                                            </tr>
                                        @endforeach
                                        @foreach($new as $val)
                                            <tr>
                                                <td>
                                                    <img src="{{action(ImageController::class.'@teacherImage', ['name' => $val->fileName])}}"
                                                         class="img-responsive" height="100" width="100"></td>
                                                <td class="text-center"><span class="fa-5x">{{$val->TeacherName}}</span>
                                                </td>
                                                <td class="text-center"><a
                                                            href="teacher/detail/{{$val->id}}"><input type="button"
                                                                                                           class="btn btn-xs btn-yellow"
                                                                                                           value="詳細"></a>
                                                </td>
                                            </tr>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
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