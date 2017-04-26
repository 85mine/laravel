@extends('layouts.main')
@section('title', trans('messages.title.project.edit'))

@section('breadcrumb')
    <h2>{{trans('messages.title.project.edit')}}</h2>
    <ol class="breadcrumb">
        <li>
            <a href="#">{{trans('messages.label.common.home')}}</a>
        </li>
        <li class="active">
            <strong>{{trans('messages.title.project.edit')}}</strong>
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
            <div class="ibox float-e-margins" id="project_edit">
                <div class="ibox-content">
                    <div class="ibox-tools m-b-md">
                        <button type="button" class="btn btn-w-m btn-primary btn_edit">{{trans('messages.label.project.edit.edit_button')}}</button>
                        <button type="button" class="btn btn-w-m btn-primary btn_update pace-inactive">{{trans('messages.label.project.edit.update_button')}}</button>
                    </div>

                    <div class="row m-b-md">
                        <div class="form-group col-sm-4">
                            <label class="font-normal">{{trans('messages.label.project.edit.budget')}}</label>
                            <div class="input-group m-b">
                                <span class="input-group-addon">¥</span> <input type="text" class="form-control m-b">
                            </div>
                        </div>
                        <div class="form-group col-sm-4">
                            <label class="font-normal">{{trans('messages.label.project.edit.accepting_base')}}</label>
                            <div>
                                <select class="input-s-lg form-control inline">
                                    <option value=""></option>
                                    @foreach ($accepting_base as $key=>$value){
                                    <option value="{{$key}}">{{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-sm-4">
                            <label class="font-normal">{{trans('messages.label.project.edit.result')}}</label>
                            <div>
                                <select class="input-s-lg form-control inline" id="result_option">
                                    @foreach ($result_option as $key=>$value){
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
                            <label class="font-normal block">
                                <span class="m-r">{{trans('messages.label.project.edit.pit_sapporo')}}</span>
                                <button type="button" class="btn btn-success">{{trans('messages.label.project.edit.candidacy')}}</button>
                                <button type="button" data-base="{{trans('messages.label.project.edit.pit_sapporo')}}" class="btn pull-right choose_base">{{trans('messages.label.project.edit.select')}}</button>
                            </label>

                            <div>
                                <textarea class="form-control" rows="5"></textarea>
                            </div>
                        </div>

                    </div>

                    <div class="row m-b-md">
                        <div class="form-group col-sm-12">
                            <label class="font-normal block">
                                <span class="m-r">{{trans('messages.label.project.edit.pco_sendai')}}</span>
                                <button type="button" class="btn btn-primary">{{trans('messages.label.project.edit.condition')}}</button>
                                <button type="button" data-base="{{trans('messages.label.project.edit.pco_sendai')}}" class="btn pull-right choose_base">{{trans('messages.label.project.edit.select')}}</button>
                            </label>

                            <div>
                                <textarea class="form-control" rows="5"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row m-b-md">
                        <div class="form-group col-sm-12">
                            <label class="font-normal block">
                                <span class="m-r">{{trans('messages.label.project.edit.pit_nagoya')}}</span>
                                <button type="button" class="btn btn-danger">{{trans('messages.label.project.edit.dismiss')}}</button>
                                <button type="button" data-base="{{trans('messages.label.project.edit.pit_nagoya')}}" class="btn pull-right choose_base">{{trans('messages.label.project.edit.select')}}</button>
                            </label>

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
            <div class="modal-content animated fadeIn">
                <div class="modal-header form-horizontal">
                    {{--<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>--}}
                    <div class="form-group col-sm-6">
                        <label class="col-sm-3 control-label">{{trans('messages.label.project.edit.base')}}</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" disabled id="content_base" value="">
                        </div>
                    </div>
                    <div class="form-group col-sm-6">
                        <div>
                            <button type="button" class="btn btn-primary">Save</button>
                            <button type="button" data-dismiss="modal" class="btn btn-white">Cancel</button>
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
            <div class="modal-content animated fadeIn">
                <div class="modal-header form-horizontal">
                    {{--<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>--}}
                    <div class="form-group col-sm-6">
                        <label class="col-sm-3 control-label">{{trans('messages.label.project.edit.result')}}</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" disabled id="content_result" value="">
                        </div>
                    </div>
                    <div class="form-group col-sm-6">
                        <div>
                            <button type="button" class="btn btn-primary">Save</button>
                            <button type="button" data-dismiss="modal" class="btn btn-white">Cancel</button>
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