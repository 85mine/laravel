@extends('backend.layout.main')
@section('title')
    {{ $breadcrumb }}
@endsection

@section('breadcrumb')
    <h2>{{ $breadcrumb }}</h2>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.dashboard') }}">{{ trans('labels.label.common.home') }}</a>
        </li>
        <li>
            <a href="{{ route('question.get.index') }}">{{ trans('labels.title.question') }}</a>
        </li>
        <li class="active">
            <strong>{{ $breadcrumb }}</strong>
        </li>
    </ol>
@endsection
@section('extend-css')
    <link href="{{url('assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                        {!! Form::model($question, ['route' => [$route], 'method' => 'POST', 'id' => 'form_question', 'class' => 'form-horizontal']) !!}
                        {!! Form::hidden('id', null) !!}
                        {!! $messages !!}
                        <div class="form-group {{ $errors->has('content') ? ' has-error' : '' }}">
                            <label class="col-sm-2 control-label">{{ trans('labels.label.question.column.content') }}</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="question_content" rows="8">{{ $question->content }}</textarea>
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('answer') ? ' has-error' : '' }}">
                            <label class="col-sm-2 control-label">{{ trans('labels.label.question.column.answer') }}</label>
                            <div class="col-sm-10 list_answer">
                                <?php
                                    $ranger_answer = range('A','E');
                                    $list_answer = json_decode($question->answer);
                                ?>
                                @foreach($ranger_answer as $key => $item)
                                    <?php $answer =  isset($list_answer[$key]) ? $list_answer[$key] : '';?>
                                    <div class="col-xs-1 no-padding"> <label class="control-label">{{$item."."}}</label></div>
                                    <div class="col-xs-11 no-padding answer_item"><input type="text" class="form-control col-sm-5 m-b-md" name="answer[]" value="{{$answer}}"></div>
                                @endforeach
                            </div>
                            {{--<div class="col-sm-1 list_button">
                                <button type="button" class="btn btn-block btn-warning m-b-md addmore"><i class="fa fa-plus"></i></button>
                            </div>--}}
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ trans('labels.label.question.column.status') }}</label>
                            <div class="col-sm-10">
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="1" {{$question->status == 1 ? 'checked':''}} > Active
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="0" {{ $question->status == 0 ? 'checked':''}} > Pending
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('type') ? ' has-error' : '' }}">
                            <label class="col-sm-2 control-label">{{ trans('labels.label.question.column.type') }}</label>
                            <div class="col-sm-3">
                                <select class="form-control" name="type">
                                    @foreach($list_type as $type_value => $type)
                                        <option value="{{$type_value}}" {{ $question->type == $type_value ? 'selected':''}}>{{$type}}</option>
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
            </div>
        </div>
    </div>

@endsection

@section('extend-js')
<script type="text/javascript">
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