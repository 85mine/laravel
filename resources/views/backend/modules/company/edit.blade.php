@extends('backend.layout.main')
@section('title')
    {{trans('labels.title.customer.customers')}}
@endsection

@section('extend-css')

@endsection

@section('breadcrumb')
    <h2>{{trans('labels.label.customer.page_title')}}</h2>
    <ol class="breadcrumb">
        <li>
            <a href="{{route('admin.dashboard')}}">{{trans('labels.label.common.home')}}</a>
        </li>
        <li class="active">
            <strong>{{trans('labels.label.customer.breadcrumb.create')}}</strong>
        </li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="row p-w-sm">
                    <div class="sml-box-header">
                    </div>
                    <div class="sml-box">
                        {!! Form::model($company, ['method' => 'POST', 'id' => 'form_company', 'class' => 'form-horizontal']) !!}
                        {!! $messages !!}
                        <div class="form-group {{ $errors->has('company_name') ? ' has-error' : '' }}">
                            <label class="col-sm-2 control-label">{{ trans('labels.label.company.column.company_name') }}</label>
                            <div class="col-sm-8">
                                {!! Form::text('company_name', null,  ["id" => "company_name", "class" => "form-control", "placeholder" => trans('labels.label.company.column.company_name')]) !!}
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('company_address') ? ' has-error' : '' }}">
                            <label class="col-sm-2 control-label">{{ trans('labels.label.company.column.company_address') }}</label>
                            <div class="col-sm-8">
                                {!! Form::text('company_address', null,  ["id" => "company_address", "class" => "form-control", "placeholder" => trans('labels.label.company.column.company_address')]) !!}
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('company_mobile') ? ' has-error' : '' }}">
                            <label class="col-sm-2 control-label">{{ trans('labels.label.company.column.company_mobile') }}</label>
                            <div class="col-sm-8">
                                {!! Form::text('company_mobile', null,  ["id" => "company_mobile", "class" => "form-control", "placeholder" => trans('labels.label.company.column.company_mobile')]) !!}
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('company_email') ? ' has-error' : '' }}">
                            <label class="col-sm-2 control-label">{{ trans('labels.label.company.column.company_email') }}</label>
                            <div class="col-sm-8">
                                {!! Form::text('company_email', null,  ["id" => "company_email", "class" => "form-control", "placeholder" => trans('labels.label.company.column.company_email')]) !!}
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('company_website') ? ' has-error' : '' }}">
                            <label class="col-sm-2 control-label">{{ trans('labels.label.company.column.company_website') }}</label>
                            <div class="col-sm-8">
                                {!! Form::text('company_website', null,  ["id" => "company_website", "class" => "form-control", "placeholder" => trans('labels.label.company.column.company_website')]) !!}
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('representative_name') ? ' has-error' : '' }}">
                            <label class="col-sm-2 control-label">{{ trans('labels.label.company.column.representative_name') }}</label>
                            <div class="col-sm-8">
                                {!! Form::text('representative_name', null,  ["id" => "representative_name", "class" => "form-control", "placeholder" => trans('labels.label.company.column.representative_name')]) !!}
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('representative_mobile') ? ' has-error' : '' }}">
                            <label class="col-sm-2 control-label">{{ trans('labels.label.company.column.representative_mobile') }}</label>
                            <div class="col-sm-8">
                                {!! Form::text('representative_mobile', null,  ["id" => "representative_mobile", "class" => "form-control", "placeholder" => trans('labels.label.company.column.representative_mobile')]) !!}
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <div class="col-sm-2 col-sm-offset-2">
                                <button class="btn btn-primary" type="submit">{{trans('labels.label.common.btnSave')}}</button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                    {{--<div class="sml-box-footer">--}}

                    {{--</div>--}}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('extend-js')

@endsection