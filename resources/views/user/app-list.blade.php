@extends('user.elements.basic')

@section('title')
    申請済み 選択科目
@endsection

@section('content-header')
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header">
            <div class="page-title mrm">
                申請済み選択科目</div>
        </div>
        <hr />
        <ol class="breadcrumb page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>&nbsp;<a href="index.html">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li><a href="#">申請済み選択科目</a>&nbsp;&nbsp;
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
                        <div class="panel panel-pink">
                            <div class="panel-heading">申請済み選択科目</div>
                                <div class="panel-body">

                                    {{--<form action="/user/app/appDelConfirm" method="post">--}}
                                        {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}

                                        <table border="1">
                                            <tr>
                                                <th class="text-center alert alert-success">科目名</th>
                                                <th class="text-center alert alert-success">承認状況</th>
                                            </tr>
                                            @foreach($appEl as $value)
                                                <tr>
                                                    <td class="text-center alert alert-warning">{{$value->subject}}</td>
                                                    <td class="text-center alert alert-warning">{{$permit[$value->id]}}</td>
                                                </tr>
                                            @endforeach
                                        </table>
                                        {{--<input type="submit" value="戻る">--}}
                                    {{--</form>--}}
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