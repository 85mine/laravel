@extends('layouts.main')
@section('title', trans('messages.title.admin.editAccount'))
@section('extend-css')
    <link href="{{url('assets/css/plugins/iCheck/custom.css')}}" rel="stylesheet">
@endsection
@section('extend-js')
    <script src="{{url('assets/js/plugins/iCheck/icheck.min.js')}}" ></script>
    <script type="application/javascript">
        $(document).ready(function(){
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
            });

            $('#deleteAccount').click(function(){
                var listDelete = [];
                $("input:checkbox[name='list[]']:checked").each(function(){
                    listDelete.push($(this).val());
                });

                if(listDelete.length == 0){
                    alert('Please select at least one item');
                }

                $("input:checkbox[name='list[]']:checked").each(function(){
                    $(this).closest('tr').remove();
                });
            });

            //Select all action
            $('#checkAll').on('ifChecked', function(event) {
                $('.i-checks').iCheck('check');
            });
            $('#checkAll').on('ifUnchecked', function(event) {
                $('.i-checks').iCheck('uncheck');
            });
        });
    </script>
@endsection
@section('breadcrumb')
    <h2>{{trans('messages.label.admin.editAccount.editAccount')}}</h2>
    <ol class="breadcrumb">
        <li>
            <a href="{{route('dashboard')}}">{{trans('messages.label.common.home')}}</a>
        </li>
        <li class="active">
            <strong>{{trans('messages.label.admin.editAccount.editAccount')}}</strong>
        </li>
    </ol>
@endsection
@section('content')
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-title">
                        <div class="ibox-tools">
                            <button type="button" class="btn btn-primary btn-danger" id="deleteAccount"><i class="fa fa-times"></i>&nbsp;{{trans('messages.label.admin.editAccount.btnDelete')}}</button>
                            <button type="button" class="btn btn-primary "><i class="fa fa-check"></i>&nbsp;{{trans('messages.label.admin.editAccount.btnSave')}}</button>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <table class="table table-bordered" id="createAccount">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="icheckbox_square-green" style="position: relative;">
                                            <input type="checkbox" class="i-checks" name="checkAll" id="checkAll" style="position: absolute; opacity: 0;">
                                        </div>
                                    </th>
                                    <th>{{trans('messages.label.admin.editAccount.department')}}</th>
                                    <th>{{trans('messages.label.admin.editAccount.base')}}</th>
                                    <th>{{trans('messages.label.admin.editAccount.name')}}</th>
                                    <th>{{trans('messages.label.admin.editAccount.id')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="icheckbox_square-green" style="position: relative;">
                                            <input type="checkbox" class="i-checks" name="list[]" value="" style="position: absolute; opacity: 0;">
                                        </div>
                                    </td>
                                    <td class="text-justify"><input type="text" name="department" placeholder="{{trans('messages.placeholder.admin.createAccount.department')}}" class="form-control"></td>
                                    <td class="text-justify"><input type="text" name="base" placeholder="{{trans('messages.placeholder.admin.createAccount.base')}}" class="form-control"></td>
                                    <td class="text-justify"><input type="text" name="name" placeholder="{{trans('messages.placeholder.admin.createAccount.name')}}" class="form-control"></td>
                                    <td class="text-justify"><input type="text" name="id" placeholder="{{trans('messages.placeholder.admin.createAccount.id')}}" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="icheckbox_square-green" style="position: relative;">
                                            <input type="checkbox" class="i-checks" name="list[]" value="" style="position: absolute; opacity: 0;">
                                        </div>
                                    </td>
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

