@extends('user.elements.basic')

@section('title')
    選択科目一覧
@endsection

@section('content-header')
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header">
            <div class="page-title mrm">
                選択科目 申請
            </div>
        </div>
        <hr/>
        <ol class="breadcrumb page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>&nbsp;
                <a href="/user/elective">選択科目 一覧</a>&nbsp;&nbsp;
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
                            <div class="panel-heading">選択科目 一覧</div>
                            <div class="panel-body">
                                <table border="0">
                                    <tr>
                                        <th class="text-center alert alert-success">科目名</th>
                                        <th class="text-center alert alert-success">操作</th>
                                    </tr>

                                    @foreach($subName as $value)
                                        <tr>
                                            <td class="text-center alert alert-warning">{{$value->subject}}</td>
                                            <td class="alert alert-warning">
                                                <a href="/user/elective/confirm/{{$value->id}}"><input type="button"
                                                                                                       class="btn btn-orange"
                                                                                                       value="申請"></a>
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