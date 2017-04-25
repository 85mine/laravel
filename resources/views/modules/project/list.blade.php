@extends('layouts.main')
@section('title', trans('messages.title.project.list'))

@section('breadcrumb')
    <h2>{{trans('messages.title.project.list')}}</h2>
    <ol class="breadcrumb">
        <li>
            <a href="#">{{trans('messages.label.common.home')}}</a>
        </li>
        <li class="active">
            <strong>{{trans('messages.title.project.list')}}</strong>
        </li>
    </ol>
@endsection

@section('extend-css')
    <link href="{{url('assets/css/plugins/datapicker/datepicker3.css')}}" rel="stylesheet">
@endsection
@section('extend-js')
    <script src="{{url('assets/js/plugins/datapicker/bootstrap-datepicker.js')}}"></script>
    <script src="{{url('assets/js/modules/project.js')}}"></script>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <div class="ibox-tools">
                            <button type="button" class="btn btn-w-m btn-default">{{trans('messages.label.project.list.reset_button')}}</button>
                            <button type="button" class="btn btn-w-m btn-primary">{{trans('messages.label.project.list.go_button')}}</button>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-3 m-b-xs">
                                <label class="font-normal">{{trans('messages.label.project.list.saler')}}</label>
                                <div>
                                    <select class="input-s-lg form-control inline bg-danger">
                                        <option value="0"></option>
                                        <option value="ABC株式会社">ABC株式会社</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-sm-3 m-b-xs">
                                <label class="font-normal">{{trans('messages.label.project.list.date')}}</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control bg-info" value="04/20/2017">
                                </div>
                            </div>

                            <div class="form-group col-sm-3 m-b-xs">
                                <label class="font-normal">{{trans('messages.label.project.list.date')}}</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control bg-info" value="04/20/2017">
                                </div>
                            </div>
                            <div class="form-group col-sm-3 m-b-xs">
                                <label class="font-normal">{{trans('messages.label.project.list.customer')}}</label>
                                <div>
                                    <input type="text" class="form-control m-b">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="form-group col-sm-3 m-b-xs">
                                <label class="font-normal">{{trans('messages.label.project.list.branch')}}</label>
                                <div>
                                    <select class="input-s-lg form-control inline bg-danger">
                                        <option value="0"></option>
                                        <option value="沖縄">沖縄</option>
                                        <option value="岐阜">岐阜</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-sm-3 m-b-xs">
                                <label class="font-normal">{{trans('messages.label.project.list.result')}}</label>
                                <div>
                                    <select class="input-s-lg form-control inline bg-danger">
                                        <option value=""></option>
                                        @foreach ($result_option as $key=>$value){
                                        <option value="{{$key}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-sm-3 m-b-xs">
                                <label class="font-normal">{{trans('messages.label.project.list.candidacy')}}</label>
                                <div>
                                    <select class="input-s-lg form-control inline bg-danger">
                                        <option value="0"></option>
                                        <option value="1">Option 2</option>
                                        <option value="2">Option 3</option>
                                        <option value="3">Option 4</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-sm-3 m-b-xs">
                                <label class="font-normal">{{trans('messages.label.project.list.service')}}</label>
                                <div>
                                    <select class="input-s-lg form-control inline bg-danger">
                                        <option value=""></option>
                                        @foreach ($service_option as $key=>$value){
                                        <option value="{{$key}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example">
                                {{--<thead>
                                <tr>
                                    <th>Rendering engine</th>
                                    <th>Browser</th>
                                    <th>Platform(s)</th>
                                    <th>Engine version</th>
                                    <th>CSS grade</th>
                                </tr>
                                </thead>--}}
                                <tbody>
                                <tr onclick="location.href='#'">
                                    <td>2017/4/20 17:00</td>
                                    <td>本田</td>
                                    <td>ABC株式会社</td>
                                    <td>ABCゲームアプリメールサポート</td>
                                    <td>
                                        <span class="m-r text-success">P札</span>
                                        <span class="m-r text-success">C博</span>
                                        <span class="m-r text-info">P東</span>
                                        <span class="m-r text-info">P名</span>
                                        <span class="m-r text-danger">P岐</span>
                                        <span class="m-r text-danger">P北</span>
                                        <span class="m-r text-danger">C沖</span>
                                        <span class="m-r text-primary">C仙</span>
                                        <span class="m-r text-primary">C岐</span>
                                        <span class="m-r text-primary">C東</span>
                                    </td>
                                </tr>
                                <tr onclick="location.href='#'">
                                    <td>2017/4/20 17:00</td>
                                    <td>本田</td>
                                    <td>ABC株式会社</td>
                                    <td>ABCゲームアプリメールサポート</td>
                                    <td>
                                        <span class="m-r text-success">P札</span>
                                        <span class="m-r text-success">C博</span>
                                        <span class="m-r text-info">P東</span>
                                        <span class="m-r text-info">P名</span>
                                        <span class="m-r text-danger">P岐</span>
                                        <span class="m-r text-danger">P北</span>
                                        <span class="m-r text-danger">C沖</span>
                                        <span class="m-r text-primary">C仙</span>
                                        <span class="m-r text-primary">C岐</span>
                                        <span class="m-r text-primary">C東</span>
                                    </td>
                                </tr>
                                <tr onclick="location.href='#'">
                                    <td>2017/4/20 17:00</td>
                                    <td>本田</td>
                                    <td>ABC株式会社</td>
                                    <td>ABCゲームアプリメールサポート</td>
                                    <td>
                                        <span class="m-r text-success">P札</span>
                                        <span class="m-r text-success">C博</span>
                                        <span class="m-r text-info">P東</span>
                                        <span class="m-r text-info">P名</span>
                                        <span class="m-r text-danger">P岐</span>
                                        <span class="m-r text-danger">P北</span>
                                        <span class="m-r text-danger">C沖</span>
                                        <span class="m-r text-primary">C仙</span>
                                        <span class="m-r text-primary">C岐</span>
                                        <span class="m-r text-primary">C東</span>
                                    </td>
                                </tr>
                                <tr onclick="location.href='#'">
                                    <td>2017/4/20 17:00</td>
                                    <td>本田</td>
                                    <td>ABC株式会社</td>
                                    <td>ABCゲームアプリメールサポート</td>
                                    <td>
                                        <span class="m-r text-success">P札</span>
                                        <span class="m-r">【未確定】</span>
                                    </td>
                                </tr>
                                <tr onclick="location.href='#'">
                                    <td>2017/4/20 17:00</td>
                                    <td>本田</td>
                                    <td>ABC株式会社</td>
                                    <td>ABCゲームアプリメールサポート</td>
                                    <td>
                                        <span class="m-r text-success">C博</span>
                                        <span class="m-r">【受注】</span>
                                    </td>
                                </tr>
                                <tr onclick="location.href='#'">
                                    <td>2017/4/20 17:00</td>
                                    <td>本田</td>
                                    <td>ABC株式会社</td>
                                    <td>ABCゲームアプリメールサポート</td>
                                    <td>
                                        <span class="m-r text-success">P札</span>
                                        <span class="m-r">【受注】</span>
                                    </td>
                                </tr>
                                <tr onclick="location.href='#'">
                                    <td>2017/4/20 17:00</td>
                                    <td>本田</td>
                                    <td>ABC株式会社</td>
                                    <td>ABCゲームアプリメールサポート</td>
                                    <td>
                                        <span class="m-r text-success">P札</span>
                                        <span class="m-r">【受注】</span>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection