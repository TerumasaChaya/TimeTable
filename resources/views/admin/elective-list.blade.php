@extends('admin.elements.basic')

@section('title')
    選択科目一覧
@endsection

@section('content-header')
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header">
            <div class="page-title mrm">
                選択科目 一覧</div>
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
                            <div class="panel-body"><h4>選択科目 一覧</h4>
                                <table border="1">
                                    <tr>
                                        <th class="text-center">科目名</th>
                                        <th class="text-center">操作</th>
                                    </tr>
                                    @foreach($subName as $value)
                                        <tr><td class="text-center">{{$value->subject}}</td>
                                            <td>
                                                <a href="/admin/elective/studentList/{{$value->id}}"><input type="button" value="認証待ち"></a>
                                                <a href="/admin/elective/authorized/{{$value->id}}"><input type="button" value="認証済み"></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
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