@extends('layouts.main')
@section('title', trans('messages.title.home.dashboard'))

@section('breadcrumb')
    <h2>@lang('messages.label.project.chosing.title')</h2>
    <ol class="breadcrumb">
        <li>
            <a href="index.html">Home</a>
        </li>
        <li>
            <a href="#">@lang('messages.label.project.chosing.route-project')</a>
        </li>
        <li class="active">
            <strong>@lang('messages.label.project.chosing.route-chosing')</strong>
        </li>
    </ol>
@endsection

@section('content')

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox-title">
                    <h5 style="color: blue;">{{ trans('messages.label.project.chosing.chosingProject') }}:
                        <span style="color: red;">7 @lang('messages.label.project.chosing.project')</span></h5>
                </div>
                <div class="scroll_content">
                    <div class="ibox-content">

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="chosing-table">
                                {{--<thead>--}}
                                {{--<tr>--}}
                                {{--<th>ID</th>--}}
                                {{--<th>Date</th>--}}
                                {{--<th>Project</th>--}}
                                {{--<th>Prepare</th>--}}
                                {{--<th>Doing</th>--}}
                                {{--<th>Cancel</th>--}}
                                {{--</tr>--}}
                                {{--</thead>--}}
                                <tbody>
                                <tr class="gradeX">
                                    <td>1</td>
                                    <td>2017/4/25 9:30</td>
                                    <td>本田</td>
                                    <td>ABC株式会社</td>
                                    <td>ABCゲームアプリメールサポート</td>
                                    <td class="center">
                                        <span class="text-success m-r">AA BB</span>
                                        <span class="text-navy m-r">CC DD</span>
                                        <span class="text-danger m-r">EE CC</span>
                                        <span class="text-primary m-r">GG HH KK</span>
                                    </td>
                                </tr>
                                <tr class="gradeC">
                                    <td>2</td>
                                    <td>2017/4/24 9:30</td>
                                    <td>本田</td>
                                    <td>ABC株式会社</td>
                                    <td>ABCゲームアプリメールサポート</td>
                                    <td class="center">
                                        <span class="text-success m-r">AA BB</span>
                                        <span class="text-navy m-r">CC DD</span>
                                        <span class="text-danger m-r">EE CC</span>
                                        <span class="text-primary m-r">GG HH KK</span>
                                    </td>
                                </tr>
                                <tr class="gradeA text-primary" style="background-color: #ed5565;">
                                    <td>3</td>
                                    <td>2017/4/23 9:30</td>
                                    <td>本田</td>
                                    <td>ABC株式会社</td>
                                    <td>ABCゲームアプリメールサポート</td>
                                    <td class="center">
                                        <span class="m-r">EE CC</span>
                                        <span class="m-r">GG HH KK</span>
                                    </td>
                                </tr>
                                <tr class="gradeA">
                                    <td>4</td>
                                    <td>2017/4/25 9:30</td>
                                    <td>本田</td>
                                    <td>ABC株式会社</td>
                                    <td>ABCゲームアプリメールサポート</td>
                                    <td class="center">
                                        <span class="text-success m-r">AA BB</span>
                                        <span class="text-navy m-r">CC DD</span>
                                        <span class="text-danger m-r">EE CC</span>
                                        <span class="text-primary m-r">GG HH KK</span>
                                    </td>
                                </tr>
                                <tr class="gradeX">
                                    <td>5</td>
                                    <td>2017/4/25 9:30</td>
                                    <td>本田</td>
                                    <td>ABC株式会社</td>
                                    <td>ABCゲームアプリメールサポート</td>
                                    <td class="center">
                                        <span class="text-success m-r">AA BB</span>
                                        <span class="text-navy m-r">CC DD</span>
                                        <span class="text-danger m-r">EE CC</span>
                                        <span class="text-primary m-r">GG HH KK</span>
                                    </td>
                                </tr>
                                <tr class="gradeC">
                                    <td>6</td>
                                    <td>2017/4/25 9:30</td>
                                    <td>本田</td>
                                    <td>ABC株式会社</td>
                                    <td>ABCゲームアプリメールサポート</td>
                                    <td class="center">
                                        <span class="text-success m-r">AA BB</span>
                                        <span class="text-navy m-r">CC DD</span>
                                        <span class="text-danger m-r">EE CC</span>
                                        <span class="text-primary m-r">GG HH KK</span>
                                    </td>
                                </tr>
                                <tr class="gradeA">
                                    <td>7</td>
                                    <td>2017/4/25 9:30</td>
                                    <td>本田</td>
                                    <td>ABC株式会社</td>
                                    <td>ABCゲームアプリメールサポート</td>
                                    <td class="center">
                                        <span class="text-success m-r">AA BB</span>
                                        <span class="text-navy m-r">CC DD</span>
                                        <span class="text-danger m-r">EE CC</span>
                                        <span class="text-primary m-r">GG HH KK</span>
                                    </td>
                                </tr>
                                </tbody>
                                {{--<tfoot>--}}
                                {{--<tr>--}}
                                {{--<th>ID</th>--}}
                                {{--<th>Date</th>--}}
                                {{--<th>Project</th>--}}
                                {{--<th>Prepare</th>--}}
                                {{--<th>Doing</th>--}}
                                {{--<th>Cancel</th>--}}
                                {{--</tr>--}}
                                {{--</tfoot>--}}
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Canceled Project-->
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5 style="color: blue;">@lang('messages.label.project.chosing.endProject')</h5>
                    </div>
                    <div class="scroll_content">
                        <div class="ibox-content">

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table- table-hover" id="end-table">
                                    {{--<thead>--}}
                                    {{--<tr>--}}
                                    {{--<th>ID</th>--}}
                                    {{--<th>Date</th>--}}
                                    {{--<th>Project</th>--}}
                                    {{--<th>Prepare</th>--}}
                                    {{--<th></th>--}}
                                    {{--</tr>--}}
                                    {{--</thead>--}}
                                    <tbody>
                                    <tr class="gradeX">
                                        <td>1</td>
                                        <td>2017/4/25 9:30</td>
                                        <td>本田</td>
                                        <td>ABC株式会社</td>
                                        <td>ABCゲームアプリメールサポート</td>
                                        <td class="center">
                                            <span class="text-success m-r">P札</span>
                                            <span class="center text-primary">
                                                    [@lang('messages.label.project.chosing.undefined')]
                                                </span>
                                        </td>
                                    </tr>
                                    <tr class="gradeX">
                                        <td>2</td>
                                        <td>2017/4/25 9:30</td>
                                        <td>本田</td>
                                        <td>ABC株式会社</td>
                                        <td>ABCゲームアプリメールサポート</td>
                                        <td class="center">
                                            <span class="text-success m-r">P札</span>
                                            <span class="center text-primary">
                                                    [@lang('messages.label.project.chosing.received')]
                                                </span>
                                        </td>
                                    </tr>
                                    <tr class="gradeX">
                                        <td>3</td>
                                        <td>2017/4/25 9:30</td>
                                        <td>本田</td>
                                        <td>ABC株式会社</td>
                                        <td>ABCゲームアプリメールサポート</td>
                                        <td class="center">
                                            <span class="text-success m-r">P札</span>
                                            <span class="center text-primary">
                                                    [@lang('messages.label.project.chosing.loss')]
                                                </span>
                                        </td>
                                    </tr>
                                    <tr class="gradeX">
                                        <td>2</td>
                                        <td>2017/4/25 9:30</td>
                                        <td>本田</td>
                                        <td>ABC株式会社</td>
                                        <td>ABCゲームアプリメールサポート</td>
                                        <td class="center">
                                            <span class="text-success m-r">P札</span>
                                            <span class="center text-primary">
                                                    [@lang('messages.label.project.chosing.received')]
                                                </span>
                                        </td>
                                    </tr>
                                    <tr class="gradeX">
                                        <td>3</td>
                                        <td>2017/4/25 9:30</td>
                                        <td>本田</td>
                                        <td>ABC株式会社</td>
                                        <td>ABCゲームアプリメールサポート</td>
                                        <td class="center">
                                            <span class="text-success m-r">P札</span>
                                            <span class="center text-primary">
                                                    [@lang('messages.label.project.chosing.loss')]
                                                </span>
                                        </td>
                                    </tr>
                                    </tbody>
                                    {{--<tfoot>--}}
                                    {{--<tr>--}}
                                    {{--<th>ID</th>--}}
                                    {{--<th>Date</th>--}}
                                    {{--<th>Project</th>--}}
                                    {{--<th>Prepare</th>--}}
                                    {{--<th></th>--}}
                                    {{--</tr>--}}
                                    {{--</tfoot>--}}
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('extend-js')
    <script>

        $(document).ready(function () {

            // Add slimscroll to element
            $('.scroll_content').slimscroll({
                height: '200px'
            });

            $('#chosing-table tbody tr').on("click", function () {
                alert("chosing " + $(this).attr("class"));
            });

            $('#end-table tbody tr').on("click", function () {
                alert("end " + $(this).attr("class"));
            });

        });

    </script>

@endsection
