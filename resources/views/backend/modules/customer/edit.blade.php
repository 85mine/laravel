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
            <strong>{{trans('labels.label.customer.breadcrumb.edit')}}</strong>
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
                        {!! Form::model($customer, ['method' => 'POST', 'id' => 'form_customer', 'class' => 'form-horizontal']) !!}
                        {!! $messages !!}
                        <div class="form-group {{ $errors->has('first_name') ? ' has-error' : '' }}">
                            <label class="col-sm-2 control-label">{{trans('labels.label.customer.column.first_name')}}</label>
                            <div class="col-sm-8">
                                {!! Form::text('first_name', null,  ["id" => "first_name", "class" => "form-control m-b", "placeholder" => trans('labels.label.customer.column.first_name')]) !!}
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('last_name') ? ' has-error' : '' }}">
                            <label class="col-sm-2 control-label">{{trans('labels.label.customer.column.last_name')}}</label>
                            <div class="col-sm-8">
                                {!! Form::text('last_name', null,  ["id" => "last_name", "class" => "form-control m-b", "placeholder" => trans('labels.label.customer.column.last_name')]) !!}
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('phone_number') ? ' has-error' : '' }}">
                            <label class="col-sm-2 control-label">{{trans('labels.label.customer.column.phone_number') }}</label>
                            <div class="col-sm-8">
                                {!! Form::text('phone_number', null,  ["id" => "phone_number", "class" => "form-control m-b", "placeholder" => trans('labels.label.customer.column.phone_number')]) !!}
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-sm-2 control-label">{{trans('labels.label.customer.column.email') }}</label>
                            <div class="col-sm-8">
                                {!! Form::text('email', null,  ["id" => "email", "class" => "form-control m-b", "placeholder" => trans('labels.label.customer.column.email')]) !!}
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