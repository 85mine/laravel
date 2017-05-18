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
                        {!! Form::open(['method' => 'POST', 'id' => 'form_customer', 'class' => 'form-horizontal']) !!}
                        {!! $messages !!}
                        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-sm-2 control-label">{{ trans('labels.label.user.create.name') }}</label>
                            <div class="col-sm-8">
                                {!! Form::text('name', null,  ["id" => "name", "class" => "form-control", "placeholder" => trans('labels.label.user.create.name')]) !!}
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-sm-2 control-label">{{ trans('labels.label.user.create.email') }}</label>
                            <div class="col-sm-8">
                                {!! Form::text('email', null,  ["id" => "email", "class" => "form-control", "placeholder" => trans('labels.label.user.create.email')]) !!}
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('company') ? ' has-error' : '' }}">
                            <label class="col-sm-2 control-label">{{ trans('labels.label.user.create.company') }}</label>
                            <div class="col-sm-8">
                                {!! Form::select('company_id', $companies, null, ["id" => "company", "class" => "form-control", "placeholder" => trans('labels.label.user.create.selectCompany')]) !!}
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