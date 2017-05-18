@extends('backend.layout.main')
@section('title')
    {{trans('labels.title.customer.customers')}}
@endsection

@section('extend-css')

@endsection

@section('breadcrumb')
    <h2>{{ trans('labels.label.ip.page_title') }}</h2>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.dashboard') }}">{{ trans('labels.title.home.dashboard') }}</a>
        </li>
        <li>
            <a href="{{ route('ip.get.index') }}">{{ trans('labels.label.ip.page_title') }}</a>
        </li>
        <li class="active">
            <strong>{{trans('labels.label.ip.breadcrumb.add')}}</strong>
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
                        {!! Form::model($ip, ['method' => 'POST', 'id' => 'form_customer', 'class' => 'form-horizontal']) !!}
                        {!! $messages !!}
                        {{--{!! dd($errors) !!}--}}
                        <div class="form-group {{ $errors->has('first_name') ? ' has-error' : '' }}">
                            <label class="col-sm-2 control-label">{{trans('labels.label.ip.column.ip_address')}}</label>
                            <div class="col-sm-8">
                                {!! Form::text('ip_address', null,  ["id" => "ip_address", "class" => "form-control", "placeholder" => trans('labels.label.ip.column.ip_address')]) !!}
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('last_name') ? ' has-error' : '' }}">
                            <label class="col-sm-2 control-label">{{trans('labels.label.ip.column.description')}}</label>
                            <div class="col-sm-8">
                                {!! Form::textarea('description', null,  ["id" => "description", "class" => "form-control", "placeholder" => trans('labels.label.ip.column.description')]) !!}
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
    <script src="{{url('assets/js/jquery.input-ip-address-control-1.0.min.js')}}"></script>
    <script>
        $(function () {
            $('input[name="ip_address"]').ipAddress();
        })
    </script>
@endsection