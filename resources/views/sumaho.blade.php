@extends('layouts.app')

@section('content')

    <!-- Bootstrapの定形コード… -->
    <section class="container">
        <div class="row">
        <div class="panel-body">
            <!-- バリデーションエラーの表示 -->

            <div  class="container">
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <td class="col-xs-1 col-md-1" rowspan="2">1</td>
                        <td class="col-xs-11 col-md-11" colspan="2">国語</td>
                    </tr>
                    <tr>
                        <td class="col-xs-3">3301</td>
                        <td class="col-xs-9">おでん</td>
                    </tr>

                    <tr>
                        <td rowspan="2">2</td>
                        <td colspan="2">算数</td>
                    </tr>
                    <tr>
                        <td>3301</td>
                        <td>おでん</td>
                    </tr>


                    <tr>
                        <td rowspan="2">3</td>
                        <td colspan="2">理科</td>
                    </tr>
                    <tr>
                        <td>3301</td>
                        <td>おでん</td>
                    </tr>


                    <tr>
                        <td rowspan="2">4</td>
                        <td colspan="2">体育</td>
                    </tr>
                    <tr>
                        <td>3301</td>
                        <td>おでん</td>
                    </tr>
<!--
                    <tr>
                        <td rowspan="2">5</td>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                    </tr>
-->
                    </tbody>
                </table>
            </div>


        </div>
    </div>
    </section>
@endsection