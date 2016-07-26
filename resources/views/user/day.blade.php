@extends('user.elements.basic')

@section('title')
    今日の時間割
@endsection

@section('content-header')
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header">
            <div class="page-title mrm">
                今日の時間割</div>
            <div class="page-subtitle">
                {{--サブタイトル入力場所--}}
            </div>
        </div>
        <hr />
        <ol class="breadcrumb page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>&nbsp;<a href="/user/day">今日の時間割</a>&nbsp;&nbsp;</li>
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
                                <div class="panel-heading">時間割</div>
                                <div class="panel-body">
                                    <table class="table table-hover table-bordered">
                                        <thead>
                                        <tr>
                                            <th class="col-lg-4">時限</th>
                                            <th class="col-lg-4">科目名</th>
                                            <th class="col-lg-4">教室</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                            @foreach($weekDay as $week)
                                                <tr>
                                                    <td>
                                                       {{$week->period}}
                                                    </td>
                                                    <td>
                                                        <a Href="/user/subjectinfo/{{$week->id}}">{{$week->subject->subject}}</a>
                                                    </td>
                                                    <td>
                                                        <a href="/user/roominfo/{{$week->room->id}}}">{{$week->room->roomName}}</a>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
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