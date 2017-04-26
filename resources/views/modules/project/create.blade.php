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
                            <div class="m-r pull-right">
                                <button class="btn btn-primary" type="submit" name="save_submit"><i class="fa fa-save"></i> {{trans('messages.label.project.create.saveProject')}}</button>
                                <button class="btn btn-warning" type="submit" name="copy_submit"><i class="fa fa-copy"></i>  {{trans('messages.label.project.create.copyProject')}}</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-sm-3">
                                    <label>{{trans('messages.label.project.create.personCareProject')}}</label>
                                    <select class="form-control m-b" name="person_care">
                                        <option>本田康稔</option>
                                        <option>本田康稔</option>
                                        <option>本田康稔</option>
                                        <option>本田康稔</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>{{trans('messages.label.project.create.createDateProject')}}</label>
                                    <div class="input-group date " name="input-date-1">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>{{trans('messages.label.project.create.deadlineDateProject')}}</label>
                                    <div class="input-group date" name="input-date-2">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <label>{{trans('messages.label.project.create.egProject')}}</label>
                                <select class="form-control m-b" name="eG">
                                    <option>あり</option>
                                    <option>なし</option>
                                    <option>不明</option>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <label>{{trans('messages.label.project.create.attractiveProject')}}</label>
                                <select class="form-control m-b" name="attractive">
                                    <option>あり</option>
                                    <option>なし</option>
                                    <option>不明</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <label>{{trans('messages.label.project.create.customerName')}}</label>
                                <input type="text" class="form-control m-b" name='customer_name'>
                            </div>
                            <div class="col-sm-6">
                                <label>{{trans('messages.label.project.create.projectName')}}</label>
                                <input type="text" class="form-control m-b" name='project_name'>
                            </div>
                            <div class="col-sm-3">
                                <label>{{trans('messages.label.project.create.serviceName')}}</label>
                                <select class="form-control m-b" name="service">
                                    <option>カスタマーサポート</option>
                                    <option>カスタマーサポート</option>
                                    <option>カスタマーサポート</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <label>{{trans('messages.label.project.create.trialPeriodDate')}}</label>
                                <input type="text" class="form-control m-b" name='trial_period_date'>
                            </div>
                            <div class="col-sm-6">
                                <label>{{trans('messages.label.project.create.estimatePeriodDate')}}</label>
                                <input type="text" class="form-control m-b" name='estimate_period_date'>
                            </div>
                            <div class="col-sm-3">
                                <label>{{trans('messages.label.project.create.startBusinessDate')}}</label>
                                <input type="text" class="form-control m-b" name='start_business_date'>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <label>{{trans('messages.label.project.create.budgetProject')}}</label>
                                <input type="text" class="form-control m-b" name="bugget_project" data-mask="¥ 999,999,999.99" placeholder="{{trans('messages.placeholder.common.currency')}}">
                            </div>
                            <div class="col-sm-6">
                                <label><input type="checkbox" class="i-checks" name="allow_select_company"> {{trans('messages.label.project.create.suggestCompany')}}</label>
                                <div class="create-pr-sub-form m-b">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label>{{trans('messages.label.project.create.assignCompany')}}</label>
                                            <select class="form-control m-b" name="assign_company" disabled>
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
                            <div class="col-sm-12">
                                <label>{{trans('messages.label.project.create.detailProject')}}</label>
                                <textarea class="form-control m-b" id="message" rows="3" placeholder="Enter a message ..."></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12"></div>
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

            $('.btn[name="save_submit"]').submit(function (e) {
                e.preventDefault();
            });

            $('.btn[name="copy_submit"]').submit(function (e) {
                e.preventDefault();
            });

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

            $('.date[name="input-date-1"], .date[name="input-date-2"], #datetimepicker5').datetimepicker({
                defaultDate: moment(),
            });
        });
    </script>
@endsection