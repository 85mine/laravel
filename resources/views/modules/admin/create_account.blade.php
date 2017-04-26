@extends('layouts.main')
@section('title', trans('messages.title.admin.createAccount'))

@section('breadcrumb')
    <h2>{{trans('messages.label.admin.createAccount.createAccount')}}</h2>
    <ol class="breadcrumb">
        <li>
            <a href="{{route('dashboard')}}">{{trans('messages.label.common.home')}}</a>
        </li>
        <li class="active">
            <strong>{{trans('messages.label.admin.createAccount.createAccount')}}</strong>
        </li>
    </ol>
@endsection
@section('content')
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-title">
                        <div class="ibox-tools">
                            <button type="button" class="btn btn-primary btn-default btn-outline" id="addMoreAccount"><i class="fa fa-plus"></i>&nbsp;{{trans('messages.label.admin.createAccount.btnAddMore')}}</button>
                            <button type="button" class="btn btn-primary "><i class="fa fa-check"></i>&nbsp;{{trans('messages.label.admin.createAccount.btnSave')}}</button>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <table class="table table-bordered" id="createAccount">
                            <thead>
                                <tr>
                                    <th>{{trans('messages.label.admin.createAccount.department')}}</th>
                                    <th>{{trans('messages.label.admin.createAccount.base')}}</th>
                                    <th>{{trans('messages.label.admin.createAccount.name')}}</th>
                                    <th>{{trans('messages.label.admin.createAccount.id')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-justify"><input type="text" name="department" placeholder="{{trans('messages.placeholder.admin.createAccount.department')}}" class="form-control"></td>
                                    <td class="text-justify"><input type="text" name="base" placeholder="{{trans('messages.placeholder.admin.createAccount.base')}}" class="form-control"></td>
                                    <td class="text-justify"><input type="text" name="name" placeholder="{{trans('messages.placeholder.admin.createAccount.name')}}" class="form-control"></td>
                                    <td class="text-justify"><input type="text" name="id" placeholder="{{trans('messages.placeholder.admin.createAccount.id')}}" class="form-control"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection
@section('extend-js')
    <script type="application/javascript">
        $(document).ready(function(){
            $('#addMoreAccount').click(function(){
                var _row = '<tr><td class="text-justify"><input type="text" placeholder="{{trans('messages.placeholder.admin.createAccount.department')}}" class="form-control"></td>'
                    + '<td class="text-justify"><input type="text" placeholder="{{trans('messages.placeholder.admin.createAccount.base')}}" class="form-control"></td>'
                    + '<td class="text-justify"><input type="text" placeholder="{{trans('messages.placeholder.admin.createAccount.name')}}" class="form-control"></td>'
                    + '<td class="text-justify"><input type="text" placeholder="{{trans('messages.placeholder.admin.createAccount.id')}}" class="form-control"></td>'
                    + '</tr>';
                $('#createAccount tbody').prepend(_row);
            });
        });
    </script>
@endsection