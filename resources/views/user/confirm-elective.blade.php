@extends('user.elements.basic')

@section('title')
    送信内容確認
@endsection

@section('content-header')
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header">
            <div class="page-title mrm">
                送信内容 確認</div>
        </div>
        <hr />
        <ol class="breadcrumb page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>&nbsp;
                <a href="/user/elective">選択科目 一覧</a>&nbsp;&nbsp;
                <i class="fa fa-angle-right"></i>&nbsp;&nbsp;
                <a href="#">送信内容 確認</a>&nbsp;&nbsp;
            <li>
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
                            <div class="panel-heading">送信内容 確認</div>
                                <div class="panel-body">

                                    <table border="0">
                                        <tr>
                                            <th class="text-center alert alert-success">科目名</th>
                                            <th class="text-center alert alert-success">操作</th>
                                        </tr>
                                        <tr><td class="text-center alert alert-warning">{{$subject->subject}}</td>

                                            <td class="alert alert-warning">
                                                <a href="/user/elective/insert/{{$subject->id}}"><input type="button" class="elective btn btn-orange" value="申請"></a>
                                                <a href="/user/elective/"><input type="button" class="btn btn-orange" value="訂正"></a>
                                            </td>
                                            {{--<td><input type="submit" value="申請"><input type="submit" value="訂正"></td>--}}

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
    <!--END CONTENT-->
@endsection

@section('page-js')
    <script type="text/javascript">

    </script>
@endsection