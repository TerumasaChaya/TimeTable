@extends('admin.elements.basic')

@section('title')
    認証待ち生徒一覧
@endsection

@section('content-header')
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header">
            <div class="page-title mrm">
                認証待ち生徒一覧</div>
            {{--<div class="page-subtitle">--}}
            {{--ここにサブタイトルが入る--}}
            {{--</div>--}}
        </div>
        <hr />
        <ol class="breadcrumb page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>&nbsp;
                <a href="/admin/elective">選択科目一覧</a>&nbsp;&nbsp;
                <i class="fa fa-angle-right"></i>&nbsp;&nbsp;
                <a href="#">認証待ち生徒一覧</a>&nbsp;&nbsp;
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
                            <div class="panel-heading">{{$subject}}</div>
                            <div class="panel-body">

                                <form action="/admin/elective/result/" method="post">
                                    {{--科目名表示 フォーカスが移らず、枠線も表示しない --}}

                                    <input type="hidden" name="subject" value="{{$subject}}">

                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <table border="1">
                                        <tr>
                                            <th class="text-center alert alert-success">申請順序</th>
                                            <th class="text-center alert alert-success">ユーザー名</th>
                                            <th class="text-center alert alert-success">クラス</th>
                                            <th class="text-center alert alert-success">選択</th>
                                        </tr>

                                        @foreach($student as $value)
                                            <tr>
                                                <td class="text-center alert alert-warning">{{$order[$value->id]}}</td>
                                                <input type="hidden" name="id[]" value="{{$value->id}}">

                                                <td class="text-center alert alert-warning">{{$value->name}}</td>
                                                <input type="hidden" name="name[]" value="{{$value->name}}">

                                                <td class="text-center alert alert-warning">{{$class[$value->id]->className}}</td>
                                                <input type="hidden" name="class[]" value="{{$class[$value->id]->className}}">
                                                <td class="alert alert-warning">
                                                    {{--チェックボックスがチェックされていない場合も、値を送るため--}}
                                                    {{--同じname{{$value->id}} を持つhidden タイプの行を追加--}}
                                                    <input type="hidden" name="{{$value->id}}" value="emp">
                                                    <input type="checkbox" name="{{$value->id}}" checked="checked">
                                                </td>
                                            </tr>
                                        @endforeach

                                    </table>
                                    <div></br>
                                    <input type="submit" class="btn btn-orange" value="認証確認">
                                    <a href='/admin/elective/'><input type="button" class="btn btn-orange" value="戻る"></a></div>
                                </form>

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