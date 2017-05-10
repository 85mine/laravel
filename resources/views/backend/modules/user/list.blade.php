@extends('backend.layout.main')
@section('title', trans('labels.title.user.list'))

@section('breadcrumb')
    <h2>Layouts</h2>
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
                    <div class="over-hidden bulk-action">
                        <a href="{{ route('user.create') }}"
                           class="btn btn-success pull-right"><i
                                    class="fa fa-fw fa-plus"></i> {{ trans('labels.label.common.btnAddMore') }}</a>
                        <a href="javascript:;"
                           class="btn btn-danger btn-delete-submit pull-right m-r-10 hidden" data-action="deleted"><i
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
                                <th class="text-center">{{ trans('labels.label.user.list.name') }}</th>
                                <th>{{ trans('labels.label.user.list.email') }}</th>
                                <th>{{ trans('labels.label.user.list.status') }}</th>
                                <th>{{ trans('labels.label.user.list.company') }}</th>
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
    </div>
@endsection
@section('extend-js')
    <script src="{{url('assets/js/plugins/dataTables/datatables.min.js')}}"></script>
    <script src="{{url('assets/js/common.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('.dataTables-example').DataTable({
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
                    {data: 'company'},
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
                    {"width": "100px", "targets": [0]},
                    {"width": "150px", "targets": [3]}
                ],
                order: [[1, 'desc']]
            });
        });

    </script>
@endsection