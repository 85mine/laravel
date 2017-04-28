@extends('layouts.main')
@section('title', trans('messages.title.report'))
@section('extend-css')
    <link href="{{url('assets/css/plugins/datetimepicker/bootstrap-datetimepicker.min.css')}}" rel="stylesheet">
    <link href="{{url('assets/css/plugins/c3/c3.min.css')}}" rel="stylesheet">
    <link href="{{url('assets/css/animate.css')}}" rel="stylesheet">
@endsection
@section('breadcrumb')
    <h2>{{ trans('messages.title.report') }}</h2>
    {{--<ol class="breadcrumb">--}}
        {{--<li>--}}
            {{--<a href="{{ route('dashboard') }}">{{ trans('messages.title.home') }}</a>--}}
        {{--</li>--}}
        {{--<li class="active">--}}
            {{--<strong>{{ trans('messages.title.report') }}</strong>--}}
        {{--</li>--}}
    {{--</ol>--}}
@endsection
@section('content')
    <div id="filter">
        <form action="#" role="form">
            <div class="row">
                <div class="col-lg-5 form-group clearfix" id="filter_daterange">
                    <div class="col-xs-6">
                        <label>{{trans('messages.label.report.from')}}</label>
                        <div id="datetimepicker_from" class="input-group date">
                            <span class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </span>
                            <input type="text" class="form-control" name="from">
                        </div>
                    </div>
                   <div id="daterange_tilde">
                        <span class="input-group-addon">～</span>
                    </div>
                    <div class="col-xs-6">
                        <label>{{trans('messages.label.report.to')}}</label>
                        <div id="datetimepicker_to" class="input-group date">
                            <span class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </span>
                            <input type="text" class="form-control" name="to">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="col-lg-6 form-group custom-select2">
                        <label for="sales_staff">{{ trans('messages.label.report.sales_staff') }}</label>
                        <select id="sales_staff" class="select2 form-control" name="sales_staff">
                            <option value="">&nbsp;</option>
                            <option value="1">金子</option>
                            <option value="2">本田康稔</option>
                            <option value="3">村田和樹</option>
                            <option value="4">本田康稔</option>
                        </select>
                    </div>
                    <div class="col-lg-6 form-group custom-select2">
                        <label for="base_name">{{ trans('messages.label.report.base_name') }}</label>
                        <select id="base_name" class="select2 form-control" name="base_name">
                            <option value="">&nbsp;</option>
                            <option value="1">沖縄</option>
                            <option value="2">岐阜</option>
                        </select>
                    </div>
                </div>

                <div class="col-lg-3 text-right filter-btn">
                    <button type="reset"
                            class="btn btn-w-m btn-default btn-reset">{{ trans('messages.label.report.clear') }}</button>
                    <button type="submit"
                            class="btn btn-w-m btn-primary">{{ trans('messages.label.report.go') }}</button>
                </div>
            </div>
        </form>
    </div>
    <div id="chart">
        <div class="row">
            <div class="col-sm-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <div id="report_img" class="text-center">
                            <img src="{{ url('assets/img/report.png') }}" alt="report">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <div>
                            <div id="pie"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <canvas id="stocked1" height="250px"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <canvas id="stocked2" height="250px"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>{{ trans('messages.label.report.preparative_rank') }} </h5>
                    </div>
                    <div class="ibox-content">

                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>{{ trans('messages.label.report.rank') }}</th>
                                <th>{{ trans('messages.label.report.company') }}</th>
                                <th>{{ trans('messages.label.report.base') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1{{ trans('messages.label.report.rank') }}</td>
                                <td>PIT</td>
                                <td>札幌</td>
                            </tr>
                            <tr>
                                <td>2{{ trans('messages.label.report.rank') }}</td>
                                <td>PIT</td>
                                <td>岐阜</td>
                            </tr>
                            <tr>
                                <td>3{{ trans('messages.label.report.rank') }}</td>
                                <td>PIT</td>
                                <td>名古屋</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>{{ trans('messages.label.report.declining_rank') }} </h5>
                    </div>
                    <div class="ibox-content">

                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>{{ trans('messages.label.report.rank') }}</th>
                                <th>{{ trans('messages.label.report.company') }}</th>
                                <th>{{ trans('messages.label.report.base') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1{{ trans('messages.label.report.rank') }}</td>
                                <td>PIT</td>
                                <td>札幌</td>
                            </tr>
                            <tr>
                                <td>2{{ trans('messages.label.report.rank') }}</td>
                                <td>PIT</td>
                                <td>岐阜</td>
                            </tr>
                            <tr>
                                <td>3{{ trans('messages.label.report.rank') }}</td>
                                <td>PIT</td>
                                <td>名古屋</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>{{ trans('messages.label.report.selection_rank') }} </h5>
                    </div>
                    <div class="ibox-content">

                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>{{ trans('messages.label.report.rank') }}</th>
                                <th>{{ trans('messages.label.report.company') }}</th>
                                <th>{{ trans('messages.label.report.base') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1{{ trans('messages.label.report.rank') }}</td>
                                <td>PIT</td>
                                <td>札幌</td>
                            </tr>
                            <tr>
                                <td>2{{ trans('messages.label.report.rank') }}</td>
                                <td>PIT</td>
                                <td>岐阜</td>
                            </tr>
                            <tr>
                                <td>3{{ trans('messages.label.report.rank') }}</td>
                                <td>PIT</td>
                                <td>名古屋</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>{{ trans('messages.label.report.order_base_rank') }} </h5>
                    </div>
                    <div class="ibox-content">

                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>{{ trans('messages.label.report.rank') }}</th>
                                <th>{{ trans('messages.label.report.company') }}</th>
                                <th>{{ trans('messages.label.report.base') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1{{ trans('messages.label.report.rank') }}</td>
                                <td>PIT</td>
                                <td>札幌</td>
                            </tr>
                            <tr>
                                <td>2{{ trans('messages.label.report.rank') }}</td>
                                <td>PIT</td>
                                <td>岐阜</td>
                            </tr>
                            <tr>
                                <td>3{{ trans('messages.label.report.rank') }}</td>
                                <td>PIT</td>
                                <td>名古屋</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>{{ trans('messages.label.report.order_business_rank') }} </h5>
                    </div>
                    <div class="ibox-content">

                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>{{ trans('messages.label.report.rank') }}</th>
                                <th>{{ trans('messages.label.report.company') }}</th>
                                <th>{{ trans('messages.label.report.base') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1{{ trans('messages.label.report.rank') }}</td>
                                <td>PIT</td>
                                <td>札幌</td>
                            </tr>
                            <tr>
                                <td>2{{ trans('messages.label.report.rank') }}</td>
                                <td>PIT</td>
                                <td>岐阜</td>
                            </tr>
                            <tr>
                                <td>3{{ trans('messages.label.report.rank') }}</td>
                                <td>PIT</td>
                                <td>名古屋</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>{{ trans('messages.label.report.order_combination') }} </h5>
                    </div>
                    <div class="ibox-content">

                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>{{ trans('messages.label.report.rank') }}</th>
                                <th>{{ trans('messages.label.report.company') }}</th>
                                <th>{{ trans('messages.label.report.base') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1{{ trans('messages.label.report.rank') }}</td>
                                <td>PIT</td>
                                <td>札幌</td>
                            </tr>
                            <tr>
                                <td>2{{ trans('messages.label.report.rank') }}</td>
                                <td>PIT</td>
                                <td>岐阜</td>
                            </tr>
                            <tr>
                                <td>3{{ trans('messages.label.report.rank') }}</td>
                                <td>PIT</td>
                                <td>名古屋</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('extend-js')
    <!-- DateTime Picker BEGIN-->
    <script type="text/javascript" src="{{url('assets/js/plugins/moment/moment.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/js/plugins/datetimepicker/datetimepicker.min.js')}}"></script>
    <!-- DateTime Picker END-->
    <script src="{{url('assets/js/plugins/d3/d3.min.js')}}"></script>
    <script src="{{url('assets/js/plugins/c3/c3.min.js')}}"></script>
    <script src="{{url('assets/js/plugins/chartJs/Chart.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            /* Date time picker */
            $('#datetimepicker_from').datetimepicker({
                format: "YYYY/MM/DD"
            });
            $('#datetimepicker_to').datetimepicker({
                format: "YYYY/MM/DD",
                useCurrent: false //Important!
            });
            $("#datetimepicker_from").on("dp.change", function (e) {
                $('#datetimepicker_to').data("DateTimePicker").minDate(e.date);
            });
            $("#datetimepicker_to").on("dp.change", function (e) {
                $('#datetimepicker_from').data("DateTimePicker").maxDate(e.date);
            });
            /* End Date time picker */

            /* Clear Btn */
            $('.btn-reset').click(function () {
                $('.select2').val('').trigger("change");
            });

            /* Pie Chart */
            c3.generate({
                bindto: '#pie',
                data: {
                    columns: [
                        ['{{ trans("messages.label.report.accepting_orders") }}', 19.6],
                        ['{{ trans("messages.label.report.loss_orders") }}', 29.4],
                        ['{{ trans("messages.label.report.undefined") }}', 51]
                    ],
                    colors: {
                        '{{ trans("messages.label.report.accepting_orders") }}': '#9BBB59',
                        '{{ trans("messages.label.report.loss_orders") }}': '#C0504D',
                        '{{ trans("messages.label.report.undefined") }}': '#4F81BD'
                    },
                    type: 'pie',
                    legend: {
                        position: 'top'
                    }
                }
            });
            /* End Pie Chart */

            /* Stock Chart */
            var stocked_options = {
                scales: {
                    xAxes: [{
                        stacked: true
                    }],
                    yAxes: [{
                        stacked: true
                    }]
                }
            };
            var data_1 = {
                labels: ['P東京', 'P札幌', 'P名古屋', 'P岐阜', 'P北九州', 'C東京', 'C仙台', 'C岐阜', 'C博多', 'C沖縄'],

                datasets: [{
                    label: '{{ trans("messages.label.report.preparative") }}',
                    data: [2, 22, 11, 17, 5, 5, 9, 4, 4, 13],
                    backgroundColor: "#4F81BD"
                },{
                    label: '{{ trans("messages.label.report.selective") }}',
                    data: [1, 10, 5, 12, 0, 1, 0, 0, 3, 1],
                    backgroundColor: "#C0504D"
                }]
            };
            var data_2 = {
                labels: ['P東京', 'P札幌', 'P名古屋', 'P岐阜', 'P北九州', 'C東京', 'C仙台', 'C岐阜', 'C博多', 'C沖縄'],

                datasets: [{
                    label: '{{ trans("messages.label.report.undefined") }}',
                    data: [1, 7, 6, 9, 0, 0, 1, 0, 1, 0],
                    backgroundColor: "#4F81BD"
                },{
                    label: '{{ trans("messages.label.report.accepting_orders") }}',
                    data: [0, 5, 1, 2, 0, 1, 0, 0, 1, 0],
                    backgroundColor: "#C0504D"
                },{
                    label: '{{ trans("messages.label.report.loss_orders") }}',
                    data: [0, 1, 5, 5, 0, 2, 0, 0, 1, 1],
                    backgroundColor: "#9BBB59"
                }]
            };
            var stocked1Chart = new Chart($('#stocked1'), {
                type: 'bar',
                data: data_1,
                options: stocked_options
            });

            var stocked2Chart = new Chart($('#stocked2'), {
                type: 'bar',
                data: data_2,
                options: stocked_options
            });
            /* End Stock Chart */
        });
    </script>
@endsection