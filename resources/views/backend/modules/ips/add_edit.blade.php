@extends('backend.layout.main')

@section('title')
    {{--    {{ $title }}--}}
@endsection

@section('breadcrumb')
    <h2>{{ trans('labels.label.ips.page_title') }}</h2>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.dashboard') }}">{{ trans('labels.title.home.dashboard') }}</a>
        </li>
        <li>
            <a href="{{ route('ips.index') }}">{{ trans('labels.label.ips.page_title') }}</a>
        </li>
        <li class="active">
            <strong>{{ $breadcrumb }}</strong>
        </li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>{{ $breadcrumb }}</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    {!! Form::model($ips, ['route' => [$route], 'method' => 'POST', 'id' => 'formIps', 'class' => 'form-horizontal']) !!}
                    {!! Form::hidden('id', null) !!}
                    {!! $messages !!}
                    <div class="form-group {{ $errors->has('ip_address') ? ' has-error' : '' }}">
                        <label class="col-sm-2 control-label">{{ trans('labels.label.ips.column.ip_address') }}</label>
                        <div class="col-sm-8">
                            {!! Form::text('ip_address', null,  ["id" => "ip_address", "class" => "form-control", "placeholder" => trans('labels.label.ips.column.ip_address')]) !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                        <label class="col-sm-2 control-label">{{ trans('labels.label.ips.column.description') }}</label>
                        <div class="col-sm-8">
                            {!! Form::textarea('description', null,  ["id" => "description", "class" => "form-control", "placeholder" => trans('labels.label.ips.column.description')]) !!}
                        </div>
                    </div>

                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-2">
                            <button class="btn btn-primary"
                                    type="submit">{{ trans('labels.label.common.btnSave') }}</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection

@section('extend-js')
    <script src="{{url('assets/js/jquery.input-ip-address-control-1.0.min.js')}}"></script>
    <script>
        $(function () {
            $('#ip_address').ipAddress();
        })
    </script>
@endsection