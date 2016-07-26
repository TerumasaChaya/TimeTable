@extends('admin.elements.basic')

@section('title')
    {{$title}}
@endsection

@section('content-header')
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header">
            <div class="page-title mrm">
                {{$title}}</div>
            {{--<div class="page-subtitle">--}}
            {{--ここにサブタイトルが入る--}}
            {{--</div>--}}
        </div>
        <hr />
        <ol class="breadcrumb page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>&nbsp;
                <a href="/admin/elective">{{$title}}</a>&nbsp;&nbsp;
            </li>
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
                        <div class="panel panel-orange">
                            <div class="panel-heading">{{$title}}</div>
                            <div class="panel-body">
                                <h4>{{$msg}}</h4>
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