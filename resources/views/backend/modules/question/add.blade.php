@extends('backend.layout.main')
@section('title')
    {{trans('labels.title.question.add')}}
@endsection

@section('extend-css')

@endsection

@section('breadcrumb')
    <h2>{{ trans('labels.label.question.page_title') }}</h2>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.dashboard') }}">{{ trans('labels.title.home.dashboard') }}</a>
        </li>
        <li>
            <a href="{{ route('question.get.index') }}">{{ trans('labels.label.question.breadcrumb.index') }}</a>
        </li>
        <li class="active">
            <strong>{{trans('labels.label.question.breadcrumb.add')}}</strong>
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
                        {!! Form::open(['method' => 'POST', 'id' => 'form_question', 'class' => 'form-horizontal']) !!}
                        {!! $messages !!}
                        <div class="form-group {{ $errors->has('content') ? ' has-error' : '' }}">
                            <label class="col-sm-2 control-label">{{ trans('labels.label.question.column.content') }}</label>
                            <div class="col-sm-10">
                                {!! Form::textarea('content', null,  ["class" => "form-control", "placeholder" => trans('labels.label.question.column.content')]) !!}
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('answer') ? ' has-error' : '' }}">
                            <label class="col-sm-2 control-label">{{ trans('labels.label.question.column.answer') }}</label>
                            <div class="col-sm-10 list_answer">
                                @foreach(range('A','E') as $key => $item)
                                    <div class="col-xs-1 no-padding"> <label class="control-label">{{"$item."}}</label></div>
                                    <div class="col-xs-11 no-padding answer_item">
                                        {!! Form::text("answer[{$key}]", null,  ["class" => "form-control col-sm-5 m-b-md"]) !!}
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ trans('labels.label.question.column.status') }}</label>
                            <div class="col-sm-10">
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        {!! Form::radio('status', 1,  ["id" => "inlineRadio1", "class" => "form-check-input"]) !!} Active
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        {!! Form::radio('status', 0,  ["id" => "inlineRadio2", "class" => "form-check-input"]) !!} Pending
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('type') ? ' has-error' : '' }}">
                            <label class="col-sm-2 control-label">{{ trans('labels.label.question.column.type') }}</label>
                            <div class="col-sm-3">
                                <select class="form-control" name="type">
                                    @foreach($list_type as $key => $type)
                                        <option value="{{$key}}">{{$type}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <div class="col-sm-2 col-sm-offset-2">
                                <button class="btn btn-primary" type="submit">{{ trans('labels.label.common.btnSave') }}</button>
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