@extends('layouts.main')
@section('title', trans('messages.title.admin.home'))

@section('breadcrumb')
    <h2>{{trans('messages.label.admin.admin.admin')}}</h2>
    <ol class="breadcrumb">
        <li>
            <a href="{{route('dashboard')}}">{{trans('messages.label.common.home')}}</a>
        </li>
        <li class="active">
            <strong>{{trans('messages.label.admin.admin.admin')}}</strong>
        </li>
    </ol>
@endsection

@section('content')
    <div class="ibox-content text-center p-md">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox text-center menu-pr-row-height">
                    <div class="col-md-6 col-lg-6"><a href="{{route('admin.createAccount')}}"><button type="button" class="btn btn-primary btn-lg dim menu-pr-btn-large btn-admin-min-width"><i class="fa fa-plus"></i>&nbsp;{{trans('messages.label.admin.admin.btnCreateAccount')}}</button></a></div>
                    <div class="col-md-6 col-lg-6"><a href="{{route('admin.createBase')}}"><button type="button" class="btn btn-primary btn-lg dim menu-pr-btn-large btn-admin-min-width"><i class="fa fa-plus"></i>&nbsp;{{trans('messages.label.admin.admin.btnCreateBase')}}</button></a></div>
                </div>
            </div>
        </div>
        &nbsp;
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox text-center menu-pr-row-height admin-menu-bottom">
                    <div class="col-md-6 col-lg-6"><a href="{{route('admin.editAccount')}}"><button type="button" class="btn btn-primary btn-lg btn-info dim menu-pr-btn-large btn-admin-min-width"><i class="fa fa-paste"></i>&nbsp;{{trans('messages.label.admin.admin.btnEditAccount')}}</button></a></div>
                    <div class="col-md-6 col-lg-6"><a href="#"><button type="button" class="btn btn-primary btn-lg btn-danger dim menu-pr-btn-large btn-admin-min-width"><i class="fa fa-times"></i>&nbsp;{{trans('messages.label.admin.admin.btnDeleteProject')}}</button></a></div>
                </div>
            </div>
        </div>
    </div>
@endsection