@extends('layouts.main')
@section('title', trans('messages.title.admin.createBase'))

@section('breadcrumb')
    <h2>{{trans('messages.label.admin.createBase.createBase')}}</h2>
    <ol class="breadcrumb">
        <li>
            <a href="{{route('dashboard')}}">{{trans('messages.title.home')}}</a>
        </li>
        <li class="active">
            <strong>{{trans('messages.label.admin.createBase.createBase')}}</strong>
        </li>
    </ol>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <form action="#" role="form">
                    <div class="ibox-title">
                        <div class="ibox-tools">
                            <button type="button" class="btn btn-primary btn-admin-min-width"
                                    id="addMoreAccount">{{trans('messages.label.common.btnAddMore')}}</button>
                            <button type="submit"
                                    class="btn btn-primary btn-admin-min-width">{{trans('messages.label.common.btnSave')}}</button>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <table class="table table-bordered" id="createBase">
                            <thead>
                            <tr>
                                <th>{{trans('messages.label.admin.createBase.company')}}</th>
                                <th>{{trans('messages.label.admin.createBase.department')}}</th>
                                <th>{{trans('messages.label.admin.createBase.base')}}</th>
                                <th>{{trans('messages.label.admin.createBase.short_name')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="text-justify">
                                    <input type="text" name="base[0][company]"
                                           placeholder="{{trans('messages.placeholder.admin.createBase.company')}}"
                                           class="form-control">
                                </td>
                                <td class="text-justify">
                                    <input type="text" name="base[0][department]"
                                           placeholder="{{trans('messages.placeholder.admin.createBase.department')}}"
                                           class="form-control">
                                </td>
                                <td class="text-justify">
                                    <input type="text" name="base[0][base]"
                                           placeholder="{{trans('messages.placeholder.admin.createBase.base')}}"
                                           class="form-control">
                                </td>
                                <td class="text-justify">
                                    <input type="text" name="base[0][short_name]"
                                           placeholder="{{trans('messages.placeholder.admin.createBase.short_name')}}"
                                           class="form-control">
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('extend-js')
    <script type="application/javascript">
        $(document).ready(function () {
            var index_name = 0;
            $('#addMoreAccount').click(function () {
                var table = $('#createBase'),
                        table_body = table.find('tbody'),
                        content_clone = table_body.clone();
                index_name ++;
                var _row = '<tr><td class="text-justify"><input type="text" name="base[' + index_name + '][company]" placeholder="{{trans('messages.placeholder.admin.createBase.company')}}" class="form-control"></td>'
                        + '<td class="text-justify"><input type="text" name="base[' + index_name + '][department]" placeholder="{{trans('messages.placeholder.admin.createBase.department')}}" class="form-control"></td>'
                        + '<td class="text-justify"><input type="text" name="base[' + index_name + '][base]" placeholder="{{trans('messages.placeholder.admin.createBase.base')}}" class="form-control"></td>'
                        + '<td class="text-justify"><input type="text" name="base[' + index_name + '][short_name]" placeholder="{{trans('messages.placeholder.admin.createBase.short_name')}}" class="form-control"></td>'
                        + '</tr>';
                table_body.html(_row);
                $.each(content_clone.find('tr'), function () {
                    table_body.append(this);
                });
            });
        });
    </script>
@endsection