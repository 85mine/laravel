@extends('layouts.main')
@section('title', trans('messages.title.admin.createAccount'))

@section('breadcrumb')
    <h2>{{trans('messages.label.admin.createAccount.createAccount')}}</h2>
    {{--<ol class="breadcrumb">--}}
        {{--<li>--}}
            {{--<a href="{{route('dashboard')}}">{{trans('messages.label.common.home')}}</a>--}}
        {{--</li>--}}
        {{--<li class="active">--}}
            {{--<strong>{{trans('messages.label.admin.createAccount.createAccount')}}</strong>--}}
        {{--</li>--}}
    {{--</ol>--}}
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
                                    <td><input type="text" name="acc[0]department" placeholder="{{trans('messages.placeholder.admin.createAccount.department')}}" class="form-control"></td>
                                    <td><input type="text" name="acc[0]base" placeholder="{{trans('messages.placeholder.admin.createAccount.base')}}" class="form-control"></td>
                                    <td><input type="text" name="acc[0]name" placeholder="{{trans('messages.placeholder.admin.createAccount.name')}}" class="form-control"></td>
                                    <td><input type="text" name="acc[0]id" placeholder="{{trans('messages.placeholder.admin.createAccount.id')}}" class="form-control"></td>
                                </tr>
                                @include('modules.admin.templateJs.new_account_template')
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection
@section('extend-js')
    <script src="{{url('assets/js/jsrender.min.js')}}"></script>
    <script type="application/javascript">
        $.views.settings.delimiters("[%", "%]");
        $(document).ready(function () {
            var index_name = 0;
            $('#addMoreAccount').click(function () {
                var table = $('#createAccount');
                var table_body = table.find('tbody');
                index_name++;
                var name = [
                    {
                        department: 'acc[' + index_name + '][department]',
                        base: 'acc[' + index_name + '][base]',
                        name: 'acc[' + index_name + '][name]',
                        id: 'acc[' + index_name + '][id]'
                    }

                ];
                var newRowTemplate = $.templates("#new_account");
                var _row = newRowTemplate.render(name);
                table_body.prepend(_row);
            });
        });
    </script>
@endsection