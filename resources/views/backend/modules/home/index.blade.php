@extends('backend.layout.main')
@section('title', trans('messages.title.home.dashboard'))

@section('breadcrumb')
    <h2>Layouts</h2>
    <ol class="breadcrumb">
        {{--<li class="active">--}}
            {{--<a href="{{ route('admin.dashboard') }}">Home</a>--}}
        {{--</li>--}}
        <li class="active">
            <strong>Home</strong>
        </li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                Content
            </div>
        </div>
    </div>
@endsection