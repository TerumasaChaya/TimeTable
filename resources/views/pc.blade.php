@extends('layouts.app')

@section('content')

    <!-- Bootstrapの定形コード… -->
    <section class="container">
        <div class="row">
            <div class="panel-body">
                <!-- バリデーションエラーの表示 -->

                <div  class="container">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <th>

                            </th>
                            <th colspan="2">月</th><th colspan="2">火</th><th colspan="2">水</th>
                            <th colspan="2">木</th><th colspan="2">金</th>
                        </thead>
                        <tbody>
                        <!-- 1時間目の列　-->

                        {{-- */$time = 1/* --}}
                        {{--*/$kyoukamei = array('国語','算数','理科','社会','体育')/*--}}
                        @for($tr = 1;$tr <=8; $tr++ )
                            <tr>
                            @if ($tr % 2 != 0)

                                <td class="col-xs-1 col-md-1" rowspan="2">{{$time++}}</td>
                                @for($kyouka = 1;$kyouka <= 5;$kyouka++)
                                    <td class="col-xs-2 col-md-2" colspan="2">{{$kyoukamei[$kyouka -1]}}</td>
                                @endfor


                            @else
                                @for($room = 1;$room <= 5;$room++)
                                    <td class="col-xs-1">3301</td>
                                    <td class="col-xs-1">おでん</td>
                                @endfor

                            @endif
                            </tr>
                        @endfor


                        </tbody>
                    </table>
                </div>


            </div>
        </div>
    </section>
@endsection