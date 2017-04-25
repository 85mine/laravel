@extends('layouts.main')
@section('title', trans('messages.title.admin.home'))

@section('breadcrumb')
    <h2>{{trans('messages.label.admin.admin')}}</h2>
    <ol class="breadcrumb">
        <li>
            <a href="{{route('dashboard')}}">{{trans('messages.label.common.home')}}</a>
        </li>
        <li class="active">
            <strong>{{trans('messages.label.admin.admin')}}</strong>
        </li>
    </ol>
@endsection

@section('content')
    <div class="ibox-content text-center p-md">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox text-center">
                    <div class="col-md-6 col-lg-6"><a href="{{route('admin.createAccount')}}"><button type="button" class="btn btn-primary btn-lg btn-admin-min-width">{{trans('messages.label.admin.createAccount')}}</button></a></div>
                    <div class="col-md-6 col-lg-6"><a href="{{route('admin.createBase')}}"><button type="button" class="btn btn-primary btn-lg btn-admin-min-width">{{trans('messages.label.admin.createBase')}}</button></a></div>
                </div>
            </div>
        </div>
        &nbsp;
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox text-center">
                    <div class="col-md-6 col-lg-6"><a href="{{route('admin.editAccount')}}"><button type="button" class="btn btn-primary btn-lg btn-admin-min-width">{{trans('messages.label.admin.editAccount')}}</button></a></div>
                    <div class="col-md-6 col-lg-6"><a href="{{route('admin.deleteProject')}}"><button type="button" class="btn btn-primary btn-lg btn-admin-min-width">{{trans('messages.label.admin.deleteProject')}}</button></a></div>
                </div>
            </div>
        </div>
    </div>
@endsection