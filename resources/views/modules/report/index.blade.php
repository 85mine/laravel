@extends('layouts.main')
@section('title', trans('messages.title.report'))
@section('extend-css')
    <link href="{{url('assets/css/plugins/datapicker/datepicker3.css')}}" rel="stylesheet">
    <link href="{{url('assets/css/plugins/select2/select2.min.css')}}" rel="stylesheet">
    <link href="{{url('assets/css/plugins/c3/c3.min.css')}}" rel="stylesheet">
@endsection
@section('breadcrumb')
    <h2>{{ trans('messages.title.report') }}</h2>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('dashboard') }}">{{ trans('messages.title.home') }}</a>
        </li>
        <li class="active">
            <strong>{{ trans('messages.title.report') }}</strong>
        </li>
    </ol>
@endsection
@section('content')
    <div id="filter">
        <form action="#" role="form">
            <div class="row">
                <div class="col-md-3" id="data_5">
                    <label for="datepicker">{{ trans('messages.label.report.from') }}</label>
                    <label for="datepicker" class="m-l-150">{{ trans('messages.label.report.to') }}</label>
                    <div class="input-daterange input-group" id="datepicker">
                        <input type="text" class="input-sm form-control" name="start" value=""/>
                        <span class="input-group-addon">～</span>
                        <input type="text" class="input-sm form-control" name="end" value=""/>
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="sales_staff">{{ trans('messages.label.report.sales_staff') }}</label>
                    <select id="sales_staff" class="select2 form-control">
                        <option value="1">Option 1</option>
                        <option value="2">Option 2</option>
                        <option value="3">Option 3</option>
                        <option value="4">Option 4</option>
                        <option value="5">Option 5</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="base_name">{{ trans('messages.label.report.base_name') }}</label>
                    <select id="base_name" class="select2 form-control">
                        <option value="1">Option 1</option>
                        <option value="2">Option 2</option>
                        <option value="3">Option 3</option>
                        <option value="4">Option 4</option>
                        <option value="5">Option 5</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <button type="reset"
                            class="btn btn-w-m btn-default m-t-18">{{ trans('messages.label.report.clear') }}</button>
                    <button type="submit"
                            class="btn btn-w-m btn-default m-t-18">{{ trans('messages.label.report.go') }}</button>
                </div>
            </div>
        </form>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <div>
                            <div id="report_img">
                                <img class="img-responsive" src="{{ url('assets/img/report.png') }}" alt="report">
                            </div>
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
                        <div>
                            <div id="stocked1"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <div>
                            <div id="stocked2"></div>
                        </div>
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
    <script src="{{url('assets/js/plugins/datapicker/bootstrap-datepicker.js')}}"></script>
    <script src="{{url('assets/js/plugins/select2/select2.full.min.js')}}"></script>
    <script src="{{url('assets/js/plugins/d3/d3.min.js')}}"></script>
    <script src="{{url('assets/js/plugins/c3/c3.min.js')}}"></script>
    <script src="{{url('assets/js/modules/report.js')}}"></script>
@endsection