@extends('backend.layout.main')
@section('title', $title)

@section('breadcrumb')
    <h2>{{ $title }}</h2>
    <ol class="breadcrumb">
        <li class="active">
            <a href="{{ route('admin.dashboard') }}">{{ trans('labels.title.home.dashboard') }}</a>
        </li>
        <li class="active">
            <strong>{{ $title }}</strong>
        </li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    {!! Form::model($user, ['route' => [$route], 'method' => 'POST', 'id' => 'formUser', 'class' => 'form-horizontal']) !!}
                    {!! Form::hidden('id', null) !!}
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
                    @if( $route == 'user.postEdit' )
                        <div class="form-group {{ $errors->has('status') ? ' has-error' : '' }}">
                            <label class="col-sm-2 control-label">{{ trans('labels.label.user.list.status') }}</label>
                            <div class="col-sm-8">
                                {!! Form::select('status', ['0' => trans('labels.label.user.create.disable'), '1' => trans('labels.label.user.create.active')],  null, ["id" => "status", "class" => "form-control m-b"]) !!}
                            </div>
                        </div>
                    @endif
                    <div class="form-group {{ $errors->has('company') ? ' has-error' : '' }}">
                        <label class="col-sm-2 control-label">{{ trans('labels.label.user.create.company') }}</label>
                        <div class="col-sm-8">
                            {!! Form::select('company_id', $companies, ($user->company_id ? $user->company_id : null), ["id" => "company", "class" => "form-control", "placeholder" => trans('labels.label.user.create.selectCompany')]) !!}
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