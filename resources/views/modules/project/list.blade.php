@extends('layouts.main')
@section('title', trans('messages.title.project.list'))

@section('breadcrumb')
    <h2>{{trans('messages.title.project.list')}}</h2>
    {{--<ol class="breadcrumb">--}}
        {{--<li>--}}
            {{--<a href="#">{{trans('messages.label.common.home')}}</a>--}}
        {{--</li>--}}
        {{--<li class="active">--}}
            {{--<strong>{{trans('messages.title.project.list')}}</strong>--}}
        {{--</li>--}}
    {{--</ol>--}}
@endsection

@section('extend-css')
    <link href="{{url('assets/css/plugins/datetimepicker/bootstrap-datetimepicker.min.css')}}" rel="stylesheet">
@endsection
@section('extend-js')
    <!-- DateTime Picker BEGIN-->
    <script type="text/javascript" src="{{url('assets/js/plugins/moment/moment.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/js/plugins/datetimepicker/datetimepicker.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('.input-group.date').datetimepicker({
                format: 'YYYY/MM/DD',
            });
        });
    </script>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <div class="ibox-tools m-b hidden-xs">
                            <button type="button" onclick="location.reload();" class="btn btn-w-m btn-default">{{trans('messages.label.project.list.reset_button')}}</button>
                            <button type="button" class="btn btn-w-m btn-primary">{{trans('messages.label.project.list.go_button')}}</button>
                        </div>
                        <div class="row m-b-md">
                            <div class="form-group col-sm-3 custom-select2">
                                <label class="font-normal">{{trans('messages.label.project.list.saler')}}</label>
                                <div>
                                    <select class="input-s-lg form-control inline select2">
                                        <option value="">&nbsp;</option>
                                        @foreach ($sales_option as $key=>$value){
                                        <option value="{{$key}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-sm-3">
                                <label class="font-normal">{{trans('messages.label.project.list.date')}}</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" value="2017/04/20">
                                </div>
                            </div>

                            <div class="form-group col-sm-3">
                                <label class="font-normal">{{trans('messages.label.project.list.date')}}</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" value="2017/04/20">
                                </div>
                            </div>
                            <div class="form-group col-sm-3">
                                <label class="font-normal">{{trans('messages.label.project.list.customer')}}</label>
                                <div>
                                    <input type="text" class="form-control m-b">
                                </div>
                            </div>

                        </div>
                        <div class="row m-b-md">
                            <div class="form-group col-sm-3 custom-select2">
                                <label class="font-normal">{{trans('messages.label.project.list.branch')}}</label>
                                <div>
                                    <select class="input-s-lg form-control inline select2">
                                        <option value="0">&nbsp;</option>
                                        <option value="1">沖縄</option>
                                        <option value="2">岐阜</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-sm-3">
                                <label class="font-normal">{{trans('messages.label.project.list.result')}}</label>
                                <div>
                                    <select class="input-s-lg form-control inline">
                                        <option value="">&nbsp;</option>
                                        @foreach ($result_option as $key=>$value){
                                        <option value="{{$key}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-sm-3">
                                <label class="font-normal">{{trans('messages.label.project.list.candidacy')}}</label>
                                <div>
                                    <select class="input-s-lg form-control inline">
                                        <option value="0">&nbsp;</option>
                                        @foreach ($candidacy_option as $key=>$value){
                                        <option value="{{$key}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-sm-3">
                                <label class="font-normal">{{trans('messages.label.project.list.service')}}</label>
                                <div>
                                    <select class="input-s-lg form-control inline">
                                        <option value="">&nbsp;</option>
                                        @foreach ($service_option as $key=>$value){
                                        <option value="{{$key}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="ibox-tools m-b visible-xs">
                            <button type="button" onclick="location.reload();" class="btn btn-w-m btn-default">{{trans('messages.label.project.list.reset_button')}}</button>
                            <button type="button" class="btn btn-w-m btn-primary">{{trans('messages.label.project.list.go_button')}}</button>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover-custom hover-pointer">
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
                                <tr onclick="location.href='{{route('project.edit',1)}}'">
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
                                <tr onclick="location.href='{{route('project.view',2)}}'">
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
                                <tr onclick="location.href='{{route('project.detailChosing',3)}}'">
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