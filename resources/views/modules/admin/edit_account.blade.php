@extends('layouts.main')
@section('title', trans('messages.title.admin.editAccount'))
@section('extend-css')
    <link href="{{url('assets/css/plugins/iCheck/custom.css')}}" rel="stylesheet">
@endsection
@section('breadcrumb')
    <h2>{{trans('messages.label.admin.editAccount.editAccount')}}</h2>
    {{--<ol class="breadcrumb">--}}
        {{--<li>--}}
            {{--<a href="{{route('dashboard')}}">{{trans('messages.label.common.home')}}</a>--}}
        {{--</li>--}}
        {{--<li class="active">--}}
            {{--<strong>{{trans('messages.label.admin.editAccount.editAccount')}}</strong>--}}
        {{--</li>--}}
    {{--</ol>--}}
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
                        <table class="table table-bordered" id="editAccount">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="icheckbox_square-green">
                                            <input type="checkbox" class="i-checks" name="checkAll" id="checkAll">
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
                                        <div class="icheckbox_square-green">
                                            <input type="checkbox" class="i-checks" name="list[]" value="">
                                        </div>
                                    </td>
                                    <td><input type="text" name="department" value="営業部" disabled="" class="form-control"></td>
                                    <td><input type="text" name="base" value="" disabled="" class="form-control"></td>
                                    <td><input type="text" name="name" value="本田康稔" disabled="" class="form-control"></td>
                                    <td><input type="text" name="id" value="aaa@pit" disabled="" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td class="align-middle">
                                        <div class="icheckbox_square-green">
                                            <input type="checkbox" class="i-checks" name="list[]" value="">
                                        </div>
                                    </td>
                                    <td><input type="text" name="department" value="営業部" disabled="" class="form-control"></td>
                                    <td><input type="text" name="base" value="PIT 岐阜" disabled="" class="form-control"></td>
                                    <td><input type="text" name="name" value="本田康稔" disabled="" class="form-control"></td>
                                    <td><input type="text" name="id" value="bbb@pit" disabled="" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="icheckbox_square-green">
                                            <input type="checkbox" class="i-checks" name="list[]" value="">
                                        </div>
                                    </td>
                                    <td><input type="text" name="department" value="選定中案件" disabled="" class="form-control"></td>
                                    <td><input type="text" name="base" value="PIT" disabled="" class="form-control"></td>
                                    <td><input type="text" name="name" value="本田康稔" disabled="" class="form-control"></td>
                                    <td><input type="text" name="id" value="ccc@pit" disabled="" class="form-control"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
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

            $('.i-checks').on('ifChecked', function(event) {
                $(this).closest('tr').find('input[type="text"]').each(function(){
                    $(this).removeAttr('disabled');
                });
            });

            $('.i-checks').on('ifUnchecked', function(event) {
                $(this).closest('tr').find('input[type="text"]').each(function(){
                    $(this).attr("disabled", true);
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
