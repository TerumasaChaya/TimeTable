@extends('user.elements.basic')

@section('title')
    ここにタイトルが入る
@endsection

@section('content-header')
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header">
            <div class="page-title mrm">
                ここにタイトルが入る</div>
            <div class="page-subtitle">
                ここにサブタイトルが入る
            </div>
        </div>
        <hr />
        <ol class="breadcrumb page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>&nbsp;<a href="index.html">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li><a href="#">ここにタイトルが入る</a>&nbsp;&nbsp;
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
                                <div class="panel-heading">ここに表のタイトルが入る</div>
                                <div class="panel-body">
                                    <table class="table table-hover table-bordered">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Column</th>
                                            <th>Column</th>
                                            <th>Column</th>
                                            <th>Column</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td class="active">active</td>
                                            <td class="success">success</td>
                                            <td class="warning">warning</td>
                                            <td class="danger">danger</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td class="active">active</td>
                                            <td class="success">success</td>
                                            <td class="warning">warning</td>
                                            <td class="danger">danger</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td class="active">active</td>
                                            <td class="success">success</td>
                                            <td class="warning">warning</td>
                                            <td class="danger">danger</td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td class="active">active</td>
                                            <td class="success">success</td>
                                            <td class="warning">warning</td>
                                            <td class="danger">danger</td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td class="active">active</td>
                                            <td class="success">success</td>
                                            <td class="warning">warning</td>
                                            <td class="danger">danger</td>
                                        </tr>
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