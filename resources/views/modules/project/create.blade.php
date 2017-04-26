@extends('layouts.main')
@section('title', trans('messages.title.home.dashboard'))
@section('breadcrumb')
    <h2>{{trans('messages.menu.createProject')}}</h2>
    <ol class="breadcrumb">
        <li>
            <a href="index.html">{{trans('messages.label.common.home')}}</a>
        </li>
        <li class="active">
            <strong>{{trans('messages.label.project.menu.create')}}</strong>
        </li>
    </ol>
@endsection

@section('extend-css')
    <!-- iCheck -->
    <link href="{{url('assets/css/plugins/iCheck/custom.css')}}" rel="stylesheet">
    <!-- DateTime Picker-->
    <link href="{{url('assets/css/plugins/datetimepicker/bootstrap-datetimepicker.min.css')}}" rel="stylesheet">
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <form method="POST">
                        <div class="row">
                            <div class="m-r pull-right form-group">
                                <button class="btn btn-primary" type="submit" name="save_submit"><i class="fa fa-save"></i> {{trans('messages.label.project.create.saveProject')}}</button>
                                <button class="btn btn-warning" type="submit" name="copy_submit"><i class="fa fa-copy"></i>  {{trans('messages.label.project.create.copyProject')}}</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3 form-group custom-select2">
                                <label>{{trans('messages.label.project.create.personCareProject')}}</label>
                                <select class="form-control m-b select2" name="person_care">
                                    @foreach ($person_care as $key=>$value){
                                    <option value="{{$key}}">{{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 form-group">
                                <label>{{trans('messages.label.project.create.createDateProject')}}</label>
                                <div class="input-group date " name="input-datetime-1">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-4 form-group">
                                <label>{{trans('messages.label.project.create.deadlineDateProject')}}</label>
                                <div class="input-group date" name="input-datetime-2">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-2 form-group custom-select2">
                                <label>{{trans('messages.label.project.create.egProject')}}</label>
                                <select class="form-control m-b select2" name="eG">
                                    @foreach ($eg_option as $key=>$value){
                                    <option value="{{$key}}">{{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-2 form-group custom-select2">
                                <label>{{trans('messages.label.project.create.attractiveProject')}}</label>
                                <select class="form-control m-b select2" name="attractive">
                                    @foreach ($attractive_option as $key=>$value){
                                    <option value="{{$key}}">{{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 form-group">
                                <label>{{trans('messages.label.project.create.customerName')}}</label>
                                <input type="text" class="form-control m-b" name='customer_name'>
                            </div>
                            <div class="col-sm-4 form-group">
                                <label>{{trans('messages.label.project.create.projectName')}}</label>
                                <input type="text" class="form-control m-b" name='project_name'>
                            </div>
                            <div class="col-sm-4 form-group custom-select2">
                                <label>{{trans('messages.label.project.create.serviceName')}}</label>
                                <select class="form-control m-b select2" name="service">
                                    @foreach ($service_option as $key=>$value){
                                    <option value="{{$key}}">{{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 form-group">
                                <label>{{trans('messages.label.project.create.trialPeriodDate')}}</label>
                                <div class="input-group date " name="input-datetime-3">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-4 form-group">
                                <label>{{trans('messages.label.project.create.estimatePeriodDate')}}</label>
                                <div class="input-group date " name="input-datetime-4">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-4 form-group">
                                <label>{{trans('messages.label.project.create.startBusinessDate')}}</label>
                                <div class="input-group date " name="input-date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 form-group">
                                <label>{{trans('messages.label.project.create.budgetProject')}}</label>
                                <input type="text" class="form-control m-b" name="bugget_project" data-mask="{{trans('messages.placeholder.common.currency')}}" placeholder="{{trans('messages.placeholder.common.currency')}}">
                            </div>
                            <div class="col-sm-4 form-group">
                                <label class="m-b create-pr-checkbox-margin"><input type="checkbox" class="i-checks" name="allow_select_company"> {{trans('messages.label.project.create.suggestCompany')}}</label>
                                <div class="create-pr-sub-form m-b">
                                    <div class="row">
                                        <div class="col-sm-12 m-t custom-select2">
                                            <label>{{trans('messages.label.project.create.assignCompany')}}</label>
                                            <select class="form-control m-b select2" name="assign_company" disabled>
                                                <option>PIT 札幌</option>
                                                <option>PIT 札幌</option>
                                                <option>PIT 札幌</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <label>{{trans('messages.label.project.create.detailProject')}}</label>
                                <textarea class="form-control m-b" id="message" rows="3" placeholder="{{trans('messages.placeholder.common.enter_message')}}"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('extend-js')
    <!-- Input Mask-->
    <script src="{{url('assets/js/plugins/jasny/jasny-bootstrap.min.js')}}"></script>
    <!-- iCheck -->
    <script src="{{url('assets/js/plugins/iCheck/icheck.min.js')}}"></script>
    <!-- DateTime Picker BEGIN-->
    <script type="text/javascript" src="{{url('assets/js/plugins/moment/moment.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/js/plugins/datetimepicker/datetimepicker.min.js')}}"></script>
    <!-- DateTime Picker END-->

    <script>
        $(document).ready(function () {

            $('form').submit(false);

            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });

            $('input[name="allow_select_company"]').on('ifClicked', function(){
                if ($(this).is(":checked")) {
                    $('select[name="assign_company"]').prop("disabled", true);
                } else {
                    $('select[name="assign_company"]').prop("disabled", false);
                }
            });

            $('.date[name*="input-datetime-"]').datetimepicker({
                defaultDate: moment(),
                allowInputToggle: true,
            });

            $('.date[name*="input-date"]').datetimepicker({
                defaultDate: moment(),
                format: 'DD/MM/YYYY',
                allowInputToggle: true,
            });
        });
    </script>
@endsection