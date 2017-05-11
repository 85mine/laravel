@extends('backend.layout.main')
@section('title')
    Question
@endsection

@section('extend-css')
    <link href="{{ URL::asset('assets/css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
    <link href="{{url('assets/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css')}}"
          rel="stylesheet">
    <link href="{{url('assets/css/plugins/jquery-confirm/jquery-confirm.min.css')}}"
          rel="stylesheet">
@endsection

@section('breadcrumb')
    <h2>Question Management</h2>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.dashboard') }}">Home</a>
        </li>
        <li class="active">
            <strong>Question</strong>
        </li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div class="over-hidden bulk-action">
                        <a href="{{ route('question.add') }}"
                           class="btn btn-success"><i
                                    class="fa fa-fw fa-plus"></i> {{ trans('labels.label.common.btnAddMore') }}</a>
                        <a href="javascript:;"
                           class="btn btn-danger btn-delete-submit m-r-10 hidden" data-action="deleted"><i
                                    class="fa fa-fw fa-remove"></i> {{ trans('labels.label.common.bulkDelete') }}</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                            <tr>
                                <th class="nosort text-center">
                                    <div class="checkbox checkbox-success">
                                        <input id="checkAll" type="checkbox" class="check-all" data-target="tbody">
                                        <label for="checkAll"></label>
                                    </div>
                                </th>
                                <th>{{ trans('labels.label.question.column.content') }}</th>
                                <th>{{ trans('labels.label.question.column.answer') }}</th>
                                <th>{{ trans('labels.label.question.column.status') }}</th>
                                <th class="nosort"></th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! Form::open(array('route' => array('question.postDelete'), 'method' => 'POST', 'id' => 'form_delete', 'class' => 'form-horizontal')) !!}
    {!! Form::hidden('id', null) !!}
    {!! Form::close() !!}
@endsection
@section('extend-js')
    <script src="{{url('assets/js/plugins/dataTables/datatables.min.js')}}"></script>
    <script src="{{url('assets/js/common.js')}}"></script>

    <script src="{{url('assets/js/plugins/jquery-confirm/jquery-confirm.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('.dataTables-example').DataTable({
                pageLength: 25,
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: {
                    "url": '{!! route('question.ajaxData') !!}',
                    "type": "GET"
                },
                aoColumns: [
                    {data: 'checkbox'},
                    {data: 'content'},
                    {data: 'answer'},
                    {data: 'status'},
                    {data: 'buttons'}
                ],
                aoColumnDefs: [
                    {
                        'aTargets': ['nosort'],
                        'bSortable': false

                    },
                    {
                        'targets': [0,3,4],
                        "sClass": "text-center"
                    },
                ],
                order: [[1, 'desc']]
            });

            $(document).on('click', '.delete', function () {
                var $form = $('#form_delete'),
                    id_input = $form.find('input[name="id"]'),
                    data_id = $(this).data('delete');
                id_input.val(data_id);

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
            })

        });
    </script>
@endsection