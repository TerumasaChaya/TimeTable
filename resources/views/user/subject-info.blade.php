@extends('user.elements.basic')

@section('title')
    {{$day->subject->subject}}の詳細
@endsection

@section('content-header')
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header">
            <div class="page-title mrm">授業詳細</div>
            <div class="page-subtitle">

            </div>
        </div>
        <hr />
        <ol class="breadcrumb page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>&nbsp;<a href="#">授業詳細</a>&nbsp;&nbsp;&nbsp;&nbsp;</li>
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

                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-grey">
                                <div class="panel-heading">{{$day->subject->subject}}</div>
                                <div class="panel-body">
                                    <table class="table table-hover table-bordered">
                                        <tr>
                                            <td width="100" align="center">授業概要</td>
                                            <td>{{$day->subject->subjectOverview}}</td>
                                        </tr>
                                        <tr>
                                            <td width="100" align="center">教室名</td>
                                            <td><a href="/user/roominfo/{{$room->id}}}">{{$room->roomName}}</a></td>
                                        </tr>
                                        <tr>
                                            <td width="100" align="center">担当教師</td>
                                            {{--教師の詳細ページへのリンク--}}
                                            <td>
                                                <a href="/user/teacher/detail/{{$day->mainTeacher->id}}">
                                                    {{$day->mainTeacher->TeacherName}}
                                                </a>
                                            </td>
                                        </tr>
                                        @if($day->subrep_t != "")
                                            <tr>
                                                {{--教師の詳細ページへのリンク--}}
                                                <td width="100" align="center">チューター</td>
                                                <td>
                                                    <a href="/user/teacher/detail/{{$day->subTeacher->id}}">
                                                        {{$day->subTeacher->TeacherName}}
                                                    </a>
                                                </td>
                                            </tr>
                                        @endif
                                    </table>
                                </div>
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