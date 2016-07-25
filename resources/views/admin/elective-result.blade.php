@extends('admin.elements.basic')

@section('title')
    申請許可 生徒一覧
@endsection

@section('content-header')
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header">
            <div class="page-title mrm">
                申請許可 生徒一覧</div>
            {{--<div class="page-subtitle">--}}
            {{--ここにサブタイトルが入る--}}
            {{--</div>--}}
        </div>
        <hr />
        {{--<ol class="breadcrumb page-breadcrumb">--}}
        {{--<li>--}}
        {{--<i class="fa fa-home"></i>&nbsp;<a href="index.html">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>--}}
        {{--<li><a href="#">ここにタイトルが入る</a>&nbsp;&nbsp;--}}
        {{--</ol>--}}
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
                            <div class="panel-body"><h4>申請許可 生徒一覧</h4>

                                <p>以下の学生の申請を許可します</p>

                                <form action="/admin/elective/update" method="post">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                    {{--科目名表示 フォーカスが移らず、枠線も表示しない --}}
                                    <input type="text" name="subject" value="{{$subject}}" onFocus="this.blur();" size="30" style=border:none;>
                                    <input type="hidden" name="subject" value="{{$subId}}">

                                    <table border="1">
                                        <tr>
                                            <th class="text-center">ユーザーID</th>
                                            <th class="text-center">ユーザー名</th>
                                            <th class="text-center">クラス</th>
                                        </tr>
                                        @foreach($result as $value)
                                            <tr>
                                                <td class="text-center">{{$value["id"]}}</td>
                                                <input type="hidden" name="id[]" value="{{$value["id"]}}">

                                                <td class="text-center">{{$value["name"]}}</td>
                                                <input type="hidden" name="name[]" value="{{$value["name"]}}">

                                                <td class="text-center">{{$value["class"]}}</td>
                                                <input type="hidden" name="class[]" value="{{$value["class"]}}">
                                            </tr>
                                        @endforeach
                                    </table>
                                    <input type="submit" value="許可">
                                    <a href="/admin/elective/studentList/{{$subId}}"><input type="button" value="キャンセル"></a>
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