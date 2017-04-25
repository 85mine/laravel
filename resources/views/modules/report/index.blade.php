@extends('layouts.main_before_login')
@section('title', trans('messages.title.report'))
@section('breadcrumb')
    <h2>{{ trans('messages.messages.report.title') }}</h2>
    <ol class="breadcrumb">
        <li>
            <a href="index.html">Home</a>
        </li>
        <li class="active">
            <strong>{{ trans('messages.messages.report.title') }}</strong>
        </li>
    </ol>
@endsection
@section('content')

@endsection