@extends('backend.layout.main')
@section('title', trans('labels.title.user.list'))
@section('extend-css')
    <link href="{{url('assets/css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">
    <link href="{{url('assets/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css')}}" rel="stylesheet">
    <link href="{{url('assets/css/plugins/jquery-confirm/jquery-confirm.min.css')}}" rel="stylesheet">
@endsection
@section('breadcrumb')
    <h2>{{ trans('labels.title.user.list') }}</h2>
    <ol class="breadcrumb">
        <li class="active">
            <a href="{{ route('admin.dashboard') }}">{{ trans('labels.title.home.dashboard') }}</a>
        </li>
        <li class="active">
            <strong>{{ trans('labels.title.user.list') }}</strong>
        </li>
    </ol>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    {!! $messages !!}
                    <div class="over-hidden bulk-action">
                        <a href="{{ route('user.create') }}"
                           class="btn btn-success"><i
                                    class="fa fa-fw fa-plus"></i> {{ trans('labels.label.common.btnAddMore') }}</a>
                        <a href="javascript:;"
                           class="btn btn-danger btn-delete-submit m-r-10 hidden" data-action="deleted"><i
                                    class="fa fa-fw fa-remove"></i> {{ trans('labels.label.common.bulkDelete') }}</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-user-list">
                            <thead>
                            <tr>
                                <th class="nosort text-center">
                                    <div class="checkbox checkbox-success">
                                        <input id="checkAll" type="checkbox" class="check-all" data-target="tbody">
                                        <label for="checkAll"></label>
                                    </div>
                                </th>
                                <th class="text-center">{{ trans('labels.label.user.list.name') }}</th>
                                <th class="text-center">{{ trans('labels.label.user.list.email') }}</th>
                                <th class="text-center">{{ trans('labels.label.user.list.status') }}</th>
                                <th class="text-center">{{ trans('labels.label.user.list.company') }}</th>
                                <th class="nosort"></th>
                            </tr>
                            </thead>
                            <tbody>
                            {{--dataTables go here--}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::open(array('route' => array('user.postDelete'), 'method' => 'POST', 'id' => 'form_delete', 'class' => 'form-horizontal')) !!}
        {!! Form::hidden('id', null) !!}
        {!! Form::close() !!}
    </div>
@endsection
@section('extend-js')
    <script src="{{url('assets/js/plugins/dataTables/datatables.min.js')}}"></script>
    <script src="{{url('assets/js/common.js')}}"></script>
    <script src="{{url('assets/js/plugins/jquery-confirm/jquery-confirm.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('.dataTables-user-list').DataTable({
                pageLength: '{!! config('app.pagination.back.users') !!}',
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: {
                    "url": '{!! route('user.ajaxList') !!}',
                    "type": "GET"
                },
                aoColumns: [
                    {data: 'checkbox'},
                    {data: 'name'},
                    {data: 'email'},
                    {data: 'status'},
                    {data: 'company_name'},
                    {data: 'buttons'}
                ],
                aoColumnDefs: [
                    {
                        'aTargets': ['nosort'],
                        'bSortable': false

                    },
                    {
                        'targets': [0, 1, 3],
                        "sClass": "text-center"
                    },
                    {"width": "50px", "targets": [0]},
                    {"width": "100px", "targets": [5]},
                    {"width": "100px", "targets": [3]}
                ],
                order: [[1, 'desc']]
            });

            $(document).on('click', '.delete', function () {
                var $form = $('#form_delete'),
                    id_input = $form.find('input[name="id"]'),
                    data_id = $(this).data('delete');
                id_input.val(data_id);

                //Tick on selected item
                var $selectedItem = $(this);
                $selectedItem.closest('tr').find('input[type=\'checkbox\']').attr('checked', true);
                $.confirm({
                    icon: 'fa fa-warning',
                    title: '{{ trans('messages.common.confirm_title') }}',
                    content: '<strong>{{ trans('messages.common.confirm_delete_question') }}</strong>',
                    animation: 'opacity',
                    closeAnimation: 'scale',
                    buttons: {
                        '{{ trans('messages.common.confirm_yes') }}': function () {
                            $form.submit();
                        },
                        '{{ trans('messages.common.confirm_no') }}': function () {
                            $selectedItem.closest('tr').find('input[type=\'checkbox\']').attr('checked', false);
                        }
                    }
                });
            });

            $(document).on('click', '.btn-delete-submit', function () {
                var check_box = $('input[type="checkbox"]:checked'),
                    $form = $('#form_delete'),
                    id_input = $form.find('input[name="id"]'),
                    temp_arr = [];
                $.each(check_box, function () {
                    var $val = $(this).val();
                    temp_arr.push($val);
                });
                id_input.val(temp_arr);
                $.confirm({
                    icon: 'fa fa-warning',
                    title: '{{ trans('messages.common.confirm_title') }}',
                    content: '<strong>{{ trans('messages.common.confirm_delete_question') }}</strong>',
                    animation: 'opacity',
                    closeAnimation: 'scale',
                    buttons: {
                        '{{ trans('messages.common.confirm_yes') }}': function () {
                            $form.submit();
                        },
                        '{{ trans('messages.common.confirm_no') }}': function () {
                            // do something
                        }
                    }
                });
            });
        });
    </script>
@endsection