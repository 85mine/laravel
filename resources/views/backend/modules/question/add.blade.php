@extends('backend.layout.main')
@section('title')
    New Question
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
                            <label class="col-sm-2 control-label">Content</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="content" rows="8">{{ old('content') }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Answer</label>
                            <div class="col-sm-8">
                                <ul class="list-group">
                                    @if(!empty(old('answer')))
                                        @foreach(old('answer') as $key => $answer)
                                        <li class="list-group-item"><input type="text" class="form-control" name="answer[]" value="{{ $answer }}"></li>
                                        @endforeach
                                    @else
                                        <li class="list-group-item"><input type="text" class="form-control" name="answer[]" value=""></li>
                                    @endif
                                </ul>
                            </div>
                            <div class="col-sm-2"><button type="button" class="btn btn-warning addmore">Add more</button></div>
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


@endsection