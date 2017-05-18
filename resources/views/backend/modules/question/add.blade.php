@extends('backend.layout.main')
@section('title')
    {{trans('labels.title.question.add')}}
@endsection

@section('extend-css')

@endsection

@section('breadcrumb')
    <h2>{{ trans('labels.label.question.breadcrumb.add') }}</h2>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.dashboard') }}">{{ trans('labels.title.home.dashboard') }}</a>
        </li>
        <li>
            <a href="{{ route('question.get.index') }}">{{ trans('labels.label.question.page_title') }}</a>
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
                                {!! Form::textarea('question_content', null,  ["id" => "question_content", "class" => "form-control", "placeholder" => trans('labels.label.question.column.content')]) !!}
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('answer') ? ' has-error' : '' }}">
                            <label class="col-sm-2 control-label">{{ trans('labels.label.question.column.answer') }}</label>
                            <div class="col-sm-10 list_answer">
                                @foreach(range('A','E') as $key => $item)
                                    <div class="col-xs-1 no-padding"> <label class="control-label">{{$item."."}}</label></div>
                                    <div class="col-xs-11 no-padding answer_item">
                                        {!! Form::text('answer[]', null,  ["class" => "form-control col-sm-5 m-b-md"]) !!}
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ trans('labels.label.question.column.status') }}</label>
                            <div class="col-sm-10">
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        {!! Form::radio('status', null,  ["id" => "inlineRadio1", "value" => "1","class" => "form-check-input"]) !!} Active
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        {!! Form::radio('status', null,  ["id" => "inlineRadio1", "value" => "0","class" => "form-check-input"]) !!} Pending
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('type') ? ' has-error' : '' }}">
                            <label class="col-sm-2 control-label">{{ trans('labels.label.question.column.type') }}</label>
                            <div class="col-sm-3">
                                <select class="form-control" name="type">
                                    @foreach($list_type as $type_value => $type)
                                        <option value="{{$type_value}}">{{$type}}</option>
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
    <script>
        $(function(){
            $('.addmore').click(function(){
                var html = '<div class="col-xs-10 no-padding answer_item">' +
                    '<input type="text" class="form-control col-sm-5 m-b-md" name="answer[]" value="">' +
                    '</div>'+
                    '<div class="col-xs-2 btn_remove">' +
                    '<button type="button" class="btn btn-danger remove" onclick="removeAnswer(this);"><i class="fa fa-times"></i></button>' +
                    '</div>';
                $('.list_answer').append(html);
            });
        });
        function removeAnswer(obj){
            var element_index = $(obj).parent().index();
            if(element_index == 1 && $('.list_answer div').length == 2){
                return false;
            }
            $(obj).parent().remove();
            $('.list_answer div').eq(element_index-1).remove();
        }
    </script>
@endsection