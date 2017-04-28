@extends('layouts.main')
@section('title', trans('messages.title.project.edit'))

@section('breadcrumb')
    <h2>{{trans('messages.title.project.edit')}}</h2>
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
    <script>
        $(document).ready(function () {

            $('.date[name*="input-datetime-"]').datetimepicker({
                format: 'YYYY/MM/DD hh:mm A',
            });

            $('.date[name*="input-date"]').datetimepicker({

                format: 'YYYY/MM/DD',
            });
            $('#result_option').change(function(){
                $('#content_result').val($(this).val());
                $('#myModal_result').modal('show');
            });
            $('.choose_base').click(function(){
                $('#content_base').val($(this).attr('data-base'));
                $('#reason_base').val('');
                $('#base_modal').modal('show');
            });
            $('#project_edit').find('.form-control').prop('disabled',true);
            $('#project_edit .choose_base').prop('disabled',true);
            $('#project_edit .btn_edit').click(function(){
                $(this).hide();
                $('.btn_update').show();
                $('#project_edit').find('.form-control').prop('disabled',false);
                $('#project_edit .choose_base').prop('disabled',false);
            });
            $('#project_edit .btn_update').click(function(){
                $(this).hide();
                $('.btn_edit').show();
                $('#project_edit').find('.form-control').prop('disabled',true);
                $('#project_edit .choose_base').prop('disabled',true);
            });
        });
    </script>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins" id="project_edit">
                <div class="ibox-content">
                    <div class="ibox-tools m-b-md">
                        <button type="button" class="btn btn-w-m btn-primary btn_edit">{{trans('messages.label.project.edit.edit_button')}}</button>
                        <button type="button" class="btn btn-w-m btn-primary btn_update pace-inactive">{{trans('messages.label.project.edit.update_button')}}</button>
                    </div>
                    <div class="row m-b-md">
                        <div class="col-sm-4 form-group">
                            <label class="font-normal">{{trans('messages.label.project.create.createDateProject')}}</label>
                            <div class="input-group date " name="input-datetime-1">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" value="2017/04/26 4:15 PM">
                            </div>
                        </div>
                        <div class="col-sm-4 form-group">
                            <label class="font-normal">{{trans('messages.label.project.create.deadlineDateProject')}}</label>
                            <div class="input-group date" name="input-datetime-2">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" value="2017/04/26 4:15 PM">
                            </div>
                        </div>
                        <div class="col-sm-2 form-group custom-select2">
                            <label class="font-normal">{{trans('messages.label.project.create.egProject')}}</label>
                            <select class="form-control m-b select2" name="eG">
                                @foreach ($eg_option as $key=>$value){
                                <option value="{{$key}}">{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-2 form-group custom-select2">
                            <label class="font-normal">{{trans('messages.label.project.create.attractiveProject')}}</label>
                            <select class="form-control m-b select2" name="attractive">
                                @foreach ($attractive_option as $key=>$value){
                                <option value="{{$key}}">{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row m-b-md">
                        <div class="col-sm-4 form-group">
                            <label class="font-normal">{{trans('messages.label.project.create.customerName')}}</label>
                            <input type="text" class="form-control m-b" name="customer_name" value="ABC株式会社">
                        </div>
                        <div class="col-sm-4 form-group">
                            <label class="font-normal">{{trans('messages.label.project.create.projectName')}}</label>
                            <input type="text" class="form-control m-b" name="project_name" value="ABCゲームアプリメールサポート">
                        </div>
                        <div class="col-sm-4 form-group custom-select2">
                            <label class="font-normal">{{trans('messages.label.project.create.serviceName')}}</label>
                            <select class="form-control m-b select2" name="service">
                                @foreach ($service_option as $key=>$value){
                                <option value="{{$key}}">{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row m-b-md">
                        <div class="col-sm-4 form-group">
                            <label class="font-normal">{{trans('messages.label.project.create.trialPeriodDate')}}</label>
                            <div class="input-group date " name="input-datetime-3">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" value="2017/04/26 4:15 PM">
                            </div>
                        </div>
                        <div class="col-sm-4 form-group">
                            <label class="font-normal">{{trans('messages.label.project.create.estimatePeriodDate')}}</label>
                            <div class="input-group date " name="input-datetime-4">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" value="2017/04/26 4:15 PM">
                            </div>
                        </div>
                        <div class="col-sm-4 form-group">
                            <label class="font-normal">{{trans('messages.label.project.create.startBusinessDate')}}</label>
                            <div class="input-group date" name="input-date">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" value="2017/04/20">
                            </div>
                        </div>
                    </div>
                    <div class="row m-b-md">
                        <div class="form-group col-sm-4">
                            <label class="font-normal">{{trans('messages.label.project.edit.budget')}}</label>
                            <div class="input-group m-b">
                                <span class="input-group-addon">¥</span> <input type="text" class="form-control m-b" value="2000000">
                            </div>
                        </div>
                        <div class="form-group col-sm-4 custom-select2">
                            <label class="font-normal">{{trans('messages.label.project.edit.accepting_base')}}</label>
                            <div>
                                <select class="input-s-lg form-control inline select2">
                                    <option value="">&nbsp;</option>
                                    @foreach ($accepting_base as $key=>$value)
                                    <option value="{{$key}}">{{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-sm-4">
                            <label class="font-normal">{{trans('messages.label.project.edit.result')}}</label>
                            <div>
                                <select class="input-s-lg form-control inline" id="result_option">
                                    @foreach ($result_option as $key=>$value)
                                    <option value="{{$value}}">{{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row m-b-md">
                        <div class="form-group col-sm-12">
                            <label class="font-normal">{{trans('messages.label.project.edit.case_details')}}</label>
                            <div>
                                <textarea class="form-control" rows="5"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row m-b-md">
                        <div class="form-group col-sm-12">
                            <div class="block">
                                <div class="label-reason">{{trans('messages.label.project.edit.pit_sapporo')}}</div>
                                <div class="bg-success hightling-reason">{{trans('messages.label.project.edit.candidacy')}}</div>
                                <button type="button" data-base="{{trans('messages.label.project.edit.pit_sapporo')}}" class="btn btn-white pull-right choose_base">{{trans('messages.label.project.edit.select')}}</button>
                            </div>

                            <div>
                                <textarea class="form-control" rows="5"></textarea>
                            </div>
                        </div>

                    </div>

                    <div class="row m-b-md">
                        <div class="form-group col-sm-12">
                            <div class="block">
                                <div class="label-reason"><span>{{trans('messages.label.project.edit.pco_sendai')}}</span></div>
                                <div class="bg-primary hightling-reason">{{trans('messages.label.project.edit.condition')}}</div>
                                <button type="button" data-base="{{trans('messages.label.project.edit.pco_sendai')}}" class="btn btn-white pull-right choose_base">{{trans('messages.label.project.edit.select')}}</button>
                            </div>

                            <div>
                                <textarea class="form-control" rows="5"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row m-b-md">
                        <div class="form-group col-sm-12">
                            <div class="block">
                                <div class="label-reason"><span>{{trans('messages.label.project.edit.pit_nagoya')}}</span></div>
                                <div class="bg-danger hightling-reason">{{trans('messages.label.project.edit.dismiss')}}</div>
                                <button type="button" data-base="{{trans('messages.label.project.edit.pit_nagoya')}}" class="btn btn-white pull-right choose_base">{{trans('messages.label.project.edit.select')}}</button>
                            </div>

                            <div>
                                <textarea class="form-control" rows="5"></textarea>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="modal inmodal" id="base_modal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content modal-customs animated fadeIn">
                <div class="modal-header form-horizontal">
                    <div class="form-group col-sm-6">
                        <label class="col-sm-3 control-label">{{trans('messages.label.project.edit.base')}}</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" disabled id="content_base" value="">
                        </div>
                    </div>
                    <div class="col-sm-4 col-sm-offset-2 pull-right">
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
                            <textarea class="form-control" rows="5" id="reason_base"></textarea>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <div class="modal inmodal" id="myModal_result" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content modal-customs animated fadeIn">
                <div class="modal-header form-horizontal">
                    <div class="form-group col-sm-6">
                        <label class="col-sm-3 control-label">{{trans('messages.label.project.edit.result')}}</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" disabled id="content_result" value="">
                        </div>
                    </div>
                    <div class="col-sm-4 col-sm-offset-2 pull-right">
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
                            <textarea class="form-control" rows="5"></textarea>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

@endsection