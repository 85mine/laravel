@extends('layouts.main')
@section('title', trans('messages.title.home.dashboard'))
@section('breadcrumb')
    <h2>Layouts</h2>
    <ol class="breadcrumb">
        <li>
            <a href="index.html">Home</a>
        </li>
        <li class="active">
            <strong>{{trans('messages.menu.managerProject')}}</strong>
        </li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div class="row menu-pr-row-height">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-3 text-center">
                            <a href="/create-project">
                                <button class="btn btn-primary dim menu-pr-btn-large" type="button"><i class="fa fa-plus fa-1x"></i> {{trans('messages.label.common.createProject')}}</button>
                            </a>
                        </div>
                        <div class="col-lg-3 text-center">
                            <a href="/edit-project">
                                <button class="btn btn-danger dim menu-pr-btn-large" type="button"><i class="fa fa-edit fa-1x"></i> {{trans('messages.label.common.editProject')}}</button>
                            </a>
                        </div>
                        <div class="col-lg-3"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection