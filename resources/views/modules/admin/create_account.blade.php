@extends('layouts.main')
@section('title', trans('messages.title.admin.createAccount'))

@section('breadcrumb')
    <h2>{{trans('messages.label.project.createAccount.createAccount')}}</h2>
    <ol class="breadcrumb">
        <li>
            <a href="{{route('dashboard')}}">{{trans('messages.label.common.home')}}</a>
        </li>
        <li class="active">
            <strong>{{trans('messages.label.project.createAccount.createAccount')}}</strong>
        </li>
    </ol>
@endsection

@section('content')
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-title">
                        <div class="ibox-tools">
                            <button type="button" class="btn btn-primary btn-admin-min-width">{{trans('messages.label.project.createAccount.btnAddMore')}}</button>
                            <button type="button" class="btn btn-primary btn-admin-min-width">{{trans('messages.label.project.createAccount.btnSave')}}</button>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>{{trans('messages.label.project.createAccount.department')}}</th>
                                    <th>{{trans('messages.label.project.createAccount.base')}}</th>
                                    <th>{{trans('messages.label.project.createAccount.name')}}</th>
                                    <th>{{trans('messages.label.project.createAccount.id')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-justify"><input type="text" placeholder="{{trans('messages.placeholder.project.createAccount.department')}}" class="form-control m-b"></td>
                                    <td class="text-justify"><input type="text" placeholder="{{trans('messages.placeholder.project.createAccount.base')}}" class="form-control m-b"></td>
                                    <td class="text-justify"><input type="text" placeholder="{{trans('messages.placeholder.project.createAccount.name')}}" class="form-control m-b"></td>
                                    <td class="text-justify"><input type="text" placeholder="{{trans('messages.placeholder.project.createAccount.id')}}" class="form-control m-b"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" placeholder="{{trans('messages.placeholder.project.createAccount.department')}}" class="form-control m-b"></td>
                                    <td><input type="text" placeholder="{{trans('messages.placeholder.project.createAccount.base')}}" class="form-control m-b"></td>
                                    <td><input type="text" placeholder="{{trans('messages.placeholder.project.createAccount.name')}}" class="form-control m-b"></td>
                                    <td><input type="text" placeholder="{{trans('messages.placeholder.project.createAccount.id')}}" class="form-control m-b"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" placeholder="{{trans('messages.placeholder.project.createAccount.department')}}" class="form-control m-b"></td>
                                    <td><input type="text" placeholder="{{trans('messages.placeholder.project.createAccount.base')}}" class="form-control m-b"></td>
                                    <td><input type="text" placeholder="{{trans('messages.placeholder.project.createAccount.name')}}" class="form-control m-b"></td>
                                    <td><input type="text" placeholder="{{trans('messages.placeholder.project.createAccount.id')}}" class="form-control m-b"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" placeholder="{{trans('messages.placeholder.project.createAccount.department')}}" class="form-control m-b"></td>
                                    <td><input type="text" placeholder="{{trans('messages.placeholder.project.createAccount.base')}}" class="form-control m-b"></td>
                                    <td><input type="text" placeholder="{{trans('messages.placeholder.project.createAccount.name')}}" class="form-control m-b"></td>
                                    <td><input type="text" placeholder="{{trans('messages.placeholder.project.createAccount.id')}}" class="form-control m-b"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

@endsection