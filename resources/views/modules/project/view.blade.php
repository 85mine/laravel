@extends('layouts.main')
@section('title', trans('messages.title.project.edit'))

@section('breadcrumb')
    <h2>{{trans('messages.menu.detailProject')}}</h2>
    {{--<ol class="breadcrumb">--}}
        {{--<li>--}}
            {{--<a href="#">{{trans('messages.label.common.home')}}</a>--}}
        {{--</li>--}}
        {{--<li class="active">--}}
            {{--<strong>{{trans('messages.title.project.edit')}}</strong>--}}
        {{--</li>--}}
    {{--</ol>--}}
@endsection

@section('extend-css')
    <!-- DateTime Picker-->
    <link href="{{url('assets/css/plugins/datetimepicker/bootstrap-datetimepicker.min.css')}}" rel="stylesheet">
@endsection
@section('extend-js')
    <!-- Input Mask-->
    <script src="{{url('assets/js/plugins/jasny/jasny-bootstrap.min.js')}}"></script>
    <!-- DateTime Picker BEGIN-->
    <script type="text/javascript" src="{{url('assets/js/plugins/moment/moment.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/js/plugins/datetimepicker/datetimepicker.min.js')}}"></script>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins" id="project_edit">
                <div class="ibox-content">
                    <div class="row m-b-md">
                        <div class="col-sm-4 form-group">
                            <label class="font-normal">{{trans('messages.label.project.create.createDateProject')}}</label>
                            <div class="input-group date " name="input-datetime-1">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" disabled  class="form-control" value="2017/04/27 15:29">
                            </div>
                        </div>
                        <div class="col-sm-4 form-group">
                            <label class="font-normal">{{trans('messages.label.project.create.deadlineDateProject')}}</label>
                            <div class="input-group date" name="input-datetime-2">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" disabled  class="form-control" value="2017/04/27 15:29">
                            </div>
                        </div>
                        <div class="col-sm-2 form-group custom-select2">
                            <label class="font-normal">{{trans('messages.label.project.create.egProject')}}</label>
                            <input type="text" disabled  class="form-control m-b" name="eG" value="あり">
                        </div>
                        <div class="col-sm-2 form-group custom-select2">
                            <label class="font-normal">{{trans('messages.label.project.create.attractiveProject')}}</label>
                            <input type="text" disabled  class="form-control m-b" name="attractive" value="あり">
                        </div>
                    </div>
                    <div class="row m-b-md">
                        <div class="col-sm-4 form-group">
                            <label class="font-normal">{{trans('messages.label.project.create.customerName')}}</label>
                            <input type="text" disabled  class="form-control m-b" name="customer_name" value="ABC株式会社">
                        </div>
                        <div class="col-sm-4 form-group">
                            <label class="font-normal">{{trans('messages.label.project.create.projectName')}}</label>
                            <input type="text" disabled  class="form-control m-b" name="project_name" value="ABCゲームアプリメールサポート">
                        </div>
                        <div class="col-sm-4 form-group custom-select2">
                            <label class="font-normal">{{trans('messages.label.project.create.serviceName')}}</label>
                            <input type="text" disabled  class="form-control m-b" name="service" value="カスタマーサポート">
                        </div>
                    </div>
                    <div class="row m-b-md">
                        <div class="col-sm-4 form-group">
                            <label class="font-normal">{{trans('messages.label.project.create.trialPeriodDate')}}</label>
                            <div class="input-group date " name="input-datetime-3">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" disabled  class="form-control" value="2017/04/27 15:29">
                            </div>
                        </div>
                        <div class="col-sm-4 form-group">
                            <label class="font-normal">{{trans('messages.label.project.create.estimatePeriodDate')}}</label>
                            <div class="input-group date " name="input-datetime-4">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" disabled  class="form-control" value="2017/04/27 15:29">
                            </div>
                        </div>
                        <div class="col-sm-4 form-group">
                            <label class="font-normal">{{trans('messages.label.project.create.startBusinessDate')}}</label>
                            <div class="input-group date" name="input-date">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" disabled  class="form-control" value="2017/04/27">
                            </div>
                        </div>
                    </div>
                    <div class="row m-b-md">
                        <div class="form-group col-sm-4">
                            <label class="font-normal">{{trans('messages.label.project.edit.budget')}}</label>
                            <div class="input-group m-b">
                                <span class="input-group-addon">¥</span> <input type="text" disabled  class="form-control m-b" value="200,000,00">
                            </div>
                        </div>
                        <div class="form-group col-sm-4 custom-select2">
                            <label class="font-normal">{{trans('messages.label.project.edit.accepting_base')}}</label>
                            <div>
                                <input type="text" disabled  class="form-control m-b" name="accepting_base" value="PIT 東京">
                            </div>
                        </div>
                        <div class="form-group col-sm-4">
                            <label class="font-normal">{{trans('messages.label.project.edit.result')}}</label>
                            <div>
                                <input type="text" disabled  class="form-control m-b" name="result_option" value="受注">
                            </div>
                        </div>
                    </div>
                    <div class="row m-b-md">
                        <div class="form-group col-sm-12">
                            <label class="font-normal">{{trans('messages.label.project.edit.case_details')}}</label>
                            <div>
                                <textarea disabled  class="form-control" rows="5"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row m-b-md">
                        <div class="form-group col-sm-12">
                            <div class="block">
                                <div class="label-reason">{{trans('messages.label.project.edit.pit_sapporo')}}</div>
                                <div class="bg-success hightling-reason">{{trans('messages.label.project.edit.candidacy')}}</div>
                            </div>

                            <div>
                                <textarea disabled  class="form-control" rows="5"></textarea>
                            </div>
                        </div>

                    </div>

                    <div class="row m-b-md">
                        <div class="form-group col-sm-12">
                            <div class="block">
                                <div class="label-reason"><span>{{trans('messages.label.project.edit.pco_sendai')}}</span></div>
                                <div class="bg-primary hightling-reason">{{trans('messages.label.project.edit.condition')}}</div>
                            </div>

                            <div>
                                <textarea disabled  class="form-control" rows="5"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row m-b-md">
                        <div class="form-group col-sm-12">
                            <div class="block">
                                <div class="label-reason"><span>{{trans('messages.label.project.edit.pit_nagoya')}}</span></div>
                                <div class="bg-danger hightling-reason">{{trans('messages.label.project.edit.dismiss')}}</div>
                            </div>

                            <div>
                                <textarea disabled  class="form-control" rows="5"></textarea>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="modal inmodal" id="base_modal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content animated fadeIn">
                <div class="modal-header form-horizontal">
                    <div class="form-group col-sm-6">
                        <label class="col-sm-3 control-label">{{trans('messages.label.project.edit.base')}}</label>
                        <div class="col-sm-9">
                            <input type="text" disabled  class="form-control" disabled id="content_base" value="">
                        </div>
                    </div>
                    <div class="form-group col-sm-6">
                        <div>
                            <button type="button" class="btn btn-primary">{{trans('messages.label.project.edit.save_button')}}</button>
                            <button type="button" data-dismiss="modal" class="btn btn-white">{{trans('messages.label.project.edit.cancel_button')}}</button>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="font-normal">{{trans('messages.label.project.edit.reason_for_select')}}</label>
                        <div>
                            <textarea disabled  class="form-control" rows="5" id="reason_base"></textarea>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <div class="modal inmodal" id="myModal_result" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content animated fadeIn">
                <div class="modal-header form-horizontal">
                    <div class="form-group col-sm-6">
                        <label class="col-sm-3 control-label">{{trans('messages.label.project.edit.result')}}</label>
                        <div class="col-sm-9">
                            <input type="text" disabled  class="form-control" disabled id="content_result" value="">
                        </div>
                    </div>
                    <div class="form-group col-sm-6">
                        <div>
                            <button type="button" class="btn btn-primary">{{trans('messages.label.project.edit.save_button')}}</button>
                            <button type="button" data-dismiss="modal" class="btn btn-white">{{trans('messages.label.project.edit.cancel_button')}}</button>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="font-normal">{{trans('messages.label.project.edit.reason')}}</label>
                        <div>
                            <textarea disabled  class="form-control" rows="5"></textarea>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

@endsection