@extends('user.elements.basic')

@section('title')
    出席照会
@endsection

@section('content-header')
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header">
            <div class="page-title mrm">
                出席照会</div>
            <div class="page-subtitle">
                出席照会ページ
            </div>
        </div>
        <hr />
        <ol class="breadcrumb page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>&nbsp;<a href="index.html">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li><a href="#">出席照会</a>&nbsp;&nbsp;
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
                            <div class="panel panel-dark">
                                <div class="panel-heading">個人別出席率表</div>
                                <div class="panel-body">
                                    <table class="table table-hover table-bordered">
                                        <thead>
                                        <tr>
                                            <th class="text-center">教科名</th>
                                            <th class="text-center">単位</th>
                                            <th class="text-center">出席</th>
                                            <th class="text-center">欠席</th>
                                            <th class="text-center">遅刻</th>
                                            <th class="text-center">公欠1</th>
                                            <th class="text-center">公欠2</th>
                                            <th class="text-center">出席率</th>
                                            <th class="text-center">出席不足単位</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($datas as $data)
                                        <tr>
                                            @for($i=0;$i<9;$i++)
                                                <td class="text-center">{{$data[$i]}}</td>
                                            @endfor
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