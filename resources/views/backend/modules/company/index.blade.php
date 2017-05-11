@extends('backend.layout.main')
@section('title', trans('labels.company'))
@section('extend-css')
    <link href="{{url('assets/css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">
    <link href="{{url('assets/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css')}}"
          rel="stylesheet">
@endsection
@section('breadcrumb')
    <h2>{{ trans('labels.label.company.page_title') }}</h2>
    <ol class="breadcrumb">
        <li class="active">
            <a href="{{ route('admin.dashboard') }}">{{ trans('labels.title.home.dashboard') }}</a>
        </li>
        <li class="active">
            <strong>{{ trans('labels.label.company.breadcrumb.index') }}</strong>
        </li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    {!! $messages !!}
                    {{--Add/Delete Button--}}
                    <div class="over-hidden bulk-action">
                        <a href="{{ route('company.getAdd') }}"
                           class="btn btn-success pull-right"><i
                                    class="fa fa-fw fa-plus"></i> {{ trans('labels.label.common.btnAddMore') }}</a>
                        <a href="javascript:;"
                           class="btn btn-danger btn-delete-submit pull-right m-r-10 hidden" data-action="deleted"><i
                                    class="fa fa-fw fa-remove"></i> {{ trans('labels.label.common.bulkDelete') }}</a>
                    </div>
                    <div class="table-responsive">
                        <table id="company_table" class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th class="nosort text-center">
                                    <div class="checkbox checkbox-success">
                                        <input id="checkAll" type="checkbox" class="check-all" data-target="tbody">
                                        <label for="checkAll"></label>
                                    </div>
                                </th>
                                <th class="text-center">{{ trans('labels.label.company.column.company_name') }}</th>
                                <th>{{ trans('labels.label.company.column.company_address') }}</th>
                                <th>{{ trans('labels.label.company.column.company_mobile') }}</th>
                                <th>{{ trans('labels.label.company.column.company_email') }}</th>
                                <th>{{ trans('labels.label.company.column.company_website') }}</th>
                                <th>{{ trans('labels.label.company.column.representative_name') }}</th>
                                <th>{{ trans('labels.label.company.column.representative_mobile') }}</th>
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
            $('#company_table').DataTable({
                pageLength: 25,
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: {
                    "url": '{!! route('company.ajaxData') !!}',
                    "type": "GET"
                },
                aoColumns: [
                    {data: 'checkbox'},
                    {data: 'company_name'},
                    {data: 'company_address'},
                    {data: 'company_mobile'},
                    {data: 'company_email'},
                    {data: 'company_website'},
                    {data: 'representative_name'},
                    {data: 'representative_mobile'},
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
