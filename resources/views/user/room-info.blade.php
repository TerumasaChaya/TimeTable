@extends('user.elements.basic')

@section('title')
    教室詳細
@endsection

@section('content-header')
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header">
            <div class="page-title mrm">
                教室詳細</div>
            <div class="page-subtitle">
                {{--サブタイトル--}}
            </div>
        </div>
        <hr />
        <ol class="breadcrumb page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>&nbsp;<a href="index.html">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li><a href="#">教室詳細</a>&nbsp;&nbsp;
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
                        <div class="panel">
                            <div class="panel-body"><h4>教室詳細</h4>

                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="panel panel-grey">
                                                <div class="panel-heading">{{$roomInfo->roomName}}</div>
                                                <div class="panel-body">
                                                    <table class="table table-hover table-bordered">
                                                        <tr>
                                                            <th>棟</th>
                                                            <th>階</th>
                                                            <th>席数</th>
                                                            <th>教室種別</th>
                                                        </tr>
                                                        <tr>
                                                            <th>{{$roomInfo->building}}</th>
                                                            <th>{{$roomInfo->Floor}}</th>
                                                            <th>{{$roomInfo->roomCapa}}</th>
                                                            <th>{{$roomInfo->roomKind}}</th>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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