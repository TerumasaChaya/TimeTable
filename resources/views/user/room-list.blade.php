@extends('user.elements.basic')

@section('title')
    教室一覧
@endsection

@section('content-header')
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header">
            <div class="page-title mrm">
                教室一覧</div>
            <div class="page-subtitle">
                {{--ここにサブタイトルが入る--}}
            </div>
        </div>
        <hr />
        <ol class="breadcrumb page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>&nbsp;<a href="index.html">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li><a href="#">教室一覧</a>&nbsp;&nbsp;
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

                {{--教室の表示ここから--}}
                {{--1号館--}}
                <div class="col-lg-12">
                    <div class="row">
                        <div class="panel">
                            <div class="panel-body">
                                <h4>1号館</h4>

                                {{--ここから本文--}}
                                <table class="table table-hover table-bordered">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th></th>
                                        {{--<th>Column</th>--}}
                                        {{--<th>Column</th>--}}
                                        {{--<th>Column</th>--}}
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($roomList1 as $room)

                                            <tr>
                                                <th>{{$room->id}}</th>
                                                <th><a Href="/user/roominfo/{{$room->id}}">{{$room->roomName}}</a></th>
                                                <th>{{$room->Floor}}</th>
                                            </tr>

                                    @endforeach

                                    </tbody>
                                </table>
                                {{--ここまで本文--}}

                            </div>
                        </div>
                    </div>
                </div>

                {{--2号館--}}
                <div class="col-lg-12">
                    <div class="row">
                        <div class="panel">
                            <div class="panel-body">
                                <h4>2号館</h4>

                                {{--ここから本文--}}
                                <table class="table table-hover table-bordered">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th></th>
                                        {{--<th>Column</th>--}}
                                        {{--<th>Column</th>--}}
                                        {{--<th>Column</th>--}}
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($roomList2 as $room)

                                        <a Href="/user/day">
                                            <tr>
                                                <th>{{$room->id}}</th>
                                                <th>{{$room->roomName}}</th>
                                                <th>{{$room->Floor}}</th>
                                            </tr>
                                        </a>
                                    @endforeach

                                    </tbody>
                                </table>
                                {{--ここまで本文--}}

                            </div>
                        </div>
                    </div>
                </div>

                {{--3号館--}}
                <div class="col-lg-12">
                    <div class="row">
                        <div class="panel">
                            <div class="panel-body">
                                <h4>3号館</h4>

                                {{--ここから本文--}}
                                <table class="table table-hover table-bordered">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th></th>
                                        {{--<th>Column</th>--}}
                                        {{--<th>Column</th>--}}
                                        {{--<th>Column</th>--}}
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($roomList3 as $room)

                                        <a Href="/user/day">
                                            <tr>
                                                <th>{{$room->id}}</th>
                                                <th>{{$room->roomName}}</th>
                                                <th>{{$room->Floor}}</th>
                                            </tr>
                                        </a>
                                    @endforeach

                                    </tbody>
                                </table>
                                {{--ここまで本文--}}

                            </div>
                        </div>
                    </div>
                </div>

                {{--その他の教室--}}
                {{--<div class="col-lg-12">--}}
                    {{--<div class="row">--}}
                        {{--<div class="panel">--}}
                            {{--<div class="panel-body">--}}
                                {{--<h4>その他</h4>--}}

                                {{--ここから本文--}}
                                {{--<table class="table table-hover table-bordered">--}}
                                    {{--<thead>--}}
                                    {{--<tr>--}}
                                        {{--<th>#</th>--}}
                                        {{--<th>Column</th>--}}
                                        {{--<th>Column</th>--}}
                                        {{--<th>Column</th>--}}
                                        {{--<th>Column</th>--}}
                                    {{--</tr>--}}
                                    {{--</thead>--}}
                                    {{--<tbody>--}}
                                    {{--@foreach($otherRoom as $room)--}}

                                        {{--<a Href="/user/day">--}}
                                            {{--<tr>--}}
                                                {{--<th>{{$room->id}}</th>--}}
                                                {{--<th>{{$room->roomName}}</th>--}}
                                                {{--<th>{{$room->Floor}}</th>--}}
                                            {{--</tr>--}}
                                        {{--</a>--}}
                                    {{--@endforeach--}}

                                    {{--</tbody>--}}
                                {{--</table>--}}
                                {{--ここまで本文--}}

                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--教室の表示ここまで--}}

            </div>
        </div>
    </div>
    <!--END CONTENT-->
@endsection

@section('page-js')
    <script type="text/javascript">

    </script>
@endsection