@extends('user.elements.basic')

@section('title')
    CarryCulum
@endsection

@section('content-header')
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header">
            <div class="page-title mrm">
                週別時間割</div>
        </div>
        <hr />
        <ol class="breadcrumb page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>&nbsp;<a href="index.html">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li><a href="#">週別時間割</a>&nbsp;&nbsp;
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
                                <div class="panel-heading">週別時間割</div>
                                <div class="panel-body">
                                    <table class="table table-hover table-bordered">
                                        <thead>
                                        <tr>
                                            <th></th>
                                            <th class="active" colspan="2">月</th>
                                            <th class="danger" colspan="2">火</th>
                                            <th class="info" colspan="2">水</th>
                                            <th class="success" colspan="2">木</th>
                                            <th class="warning" colspan="2">金</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <!-- 1時間目の列　-->

                                        {{-- */$time = 1/* --}}


                                        {{--*/$kyoukamei = array('国語','算数','理科','社会','体育')/*--}}
                                        {{--*/$roomname = array('3301','3601','3302','2203','1305')/* --}}
                                        {{--*/$teachername = array('t1','t2','t3','t4','t5')/*--}}






                                        {{--*/$a = 0/*--}}
                                        {{--*/$b = 0/*--}}
                                        @for($tr = 1;$tr <=8; $tr++ )

                                            <tr>
                                                @if ($tr % 2 != 0)

                                                    <td class="col-xs-1 col-md-1" rowspan="2">{{$time++}}</td>

                                                    @for($kyouka = 1;$kyouka <= 5;$kyouka++)

                                                        <td class="col-xs-2 col-md-2" colspan="2">{{$weekperiod[$a]['subject']}}</td>
                                                        {{--*/$a = $a + 1/*--}}



                                                    @endfor


                                                @else
                                                    @for($room = 1;$room <= 5;$room++)
                                                        <td class="col-xs-1">{{$weekperiod[$b]['class']}}</td>
                                                        <td class="col-xs-1">{{$weekperiod[$b]['teacher']}}</td>
                                                        {{--*/$b = $b + 1/*--}}
                                                    @endfor



                                                @endif
                                            </tr>
                                        @endfor
                                        {{--<tr>--}}
                                            {{--<td>1</td>--}}
                                            {{--<td class="active">active</td>--}}
                                            {{--<td class="success">success</td>--}}
                                            {{--<td class="warning">warning</td>--}}
                                            {{--<td class="danger">danger</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                            {{--<td>2</td>--}}
                                            {{--<td class="active">active</td>--}}
                                            {{--<td class="success">success</td>--}}
                                            {{--<td class="warning">warning</td>--}}
                                            {{--<td class="danger">danger</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                            {{--<td>3</td>--}}
                                            {{--<td class="active">active</td>--}}
                                            {{--<td class="success">success</td>--}}
                                            {{--<td class="warning">warning</td>--}}
                                            {{--<td class="danger">danger</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                            {{--<td>4</td>--}}
                                            {{--<td class="active">active</td>--}}
                                            {{--<td class="success">success</td>--}}
                                            {{--<td class="warning">warning</td>--}}
                                            {{--<td class="danger">danger</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                            {{--<td>5</td>--}}
                                            {{--<td class="active">active</td>--}}
                                            {{--<td class="success">success</td>--}}
                                            {{--<td class="warning">warning</td>--}}
                                            {{--<td class="danger">danger</td>--}}
                                        {{--</tr>--}}
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