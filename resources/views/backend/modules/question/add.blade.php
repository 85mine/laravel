@extends('backend.layout.main')
@section('title')
    Add new question
@endsection

@section('extend-css')
    <link href="{{ URL::asset('assets/css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
@endsection

@section('breadcrumb')
    <h2>Question Management</h2>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.dashboard') }}">Home</a>
        </li>
        <li>
            <a href="{{ route('question.add') }}">Question</a>
        </li>
        <li class="active">
            <strong>Add</strong>
        </li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Add Question</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <form action="{{ route('question.add') }}" method="post" class="form-horizontal">
                        {!! csrf_field() !!}
                        {!! $messages !!}
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Question</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="content" rows="8">{{ old('content') }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Answer</label>
                            <div class="col-sm-8 list_answer">
                                @if(!empty(old('answer')))
                                    @foreach(old('answer') as $key => $answer)
                                        <input type="text" class="form-control m-b-md" name="answer[]" value="{{ $answer }}">
                                    @endforeach
                                @else
                                    <input type="text" class="form-control m-b-md" name="answer[]" value="">
                                @endif
                            </div>
                            <div class="col-sm-2">
                                <button type="button" class="btn btn-warning addmore">Add more</button>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Status</label>
                            <div class="col-sm-10">
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="1"> Active
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="0" checked> Pending
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-4">
                                <a class="btn btn-white" href="#" role="button">Cancel</a>
                                <button class="btn btn-primary" type="submit">Create New</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('extend-js')
<script type="text/javascript">
    $(function(){
        $('.addmore').click(function(){
            $('.list_answer').append('<input type="text" class="form-control m-b-md" name="answer[]" value="">');
        });
    })
</script>


@endsection