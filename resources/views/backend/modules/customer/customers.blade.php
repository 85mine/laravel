@extends('backend.layout.main')
@section('title')
    {{trans('labels.title.customer.customers')}}
@endsection

@section('extend-css')
    <!-- Magic-Check -->
    <link href="{{url('assets/css/plugins/magic-check/magic-check.min.css')}}" rel="stylesheet">
    <!-- dataTables -->
    <link href="{{url('assets/css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">
@endsection

@section('breadcrumb')
    <h2>{{trans('labels.label.customer.header')}}</h2>
    <ol class="breadcrumb">
        <li>
            <a href="{{route('admin.dashboard')}}">{{trans('labels.label.common.home')}}</a>
        </li>
        <li class="active">
            <strong>{{trans('labels.title.customer.customers')}}</strong>
        </li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="row p-w-sm">
                    <div class="sml-box-header">
                        {{--Add/Delete Button--}}
                        <div class="over-hidden bulk-action">
                            <a href="{{ route('customer.getCreate') }}" class="btn btn-success"><i class="fa fa-fw fa-plus"></i> {{ trans('labels.label.common.btnAddMore') }}</a>
                            <a href="{{ route('customer.postDelete') }}" class="btn btn-disable" onclick="return false;"><i class="fa fa-fw fa-remove"></i> {{ trans('labels.label.common.btnDelete') }}</a>
                        </div>
                    </div>
                    <div class="sml-box">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables">
                                <thead>
                                <tr>
                                    <th>
                                        <input class="select_all magic-checkbox" type="checkbox" id="select_all_top">
                                        <label for="select_all_top"></label>
                                    </th>
                                    <th>{{trans('labels.label.customer.column.id')}}</th>
                                    <th>{{trans('labels.label.customer.column.first_name')}}</th>
                                    <th>{{trans('labels.label.customer.column.last_name')}}</th>
                                    <th>{{trans('labels.label.customer.column.phone_number')}}</th>
                                    <th>{{trans('labels.label.customer.column.email')}}</th>
                                    <th>{{trans('labels.label.customer.column.action')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                    {{--DataTables--}}
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>
                                        <input class="select_all magic-checkbox" type="checkbox" id="select_all_bottom">
                                        <label for="select_all_bottom"></label>
                                    </th>
                                    <th>{{trans('labels.label.customer.column.id')}}</th>
                                    <th>{{trans('labels.label.customer.column.first_name')}}</th>
                                    <th>{{trans('labels.label.customer.column.last_name')}}</th>
                                    <th>{{trans('labels.label.customer.column.phone_number')}}</th>
                                    <th>{{trans('labels.label.customer.column.email')}}</th>
                                    <th>{{trans('labels.label.customer.column.action')}}</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="sml-box-footer">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('extend-js')
    <!-- dataTables -->
    <script src="{{url('assets/js/plugins/dataTables/datatables.min.js')}}"></script>
    <script type="text/javascript">
        $('.dataTables').DataTable({
            pageLength: 10,
            destroy: true,
            responsive: true,
            processing: true,
            serverSide: true,
            autoWidth: false,
            ajax: {
                "url": '{!! route('customer.getAjaxData') !!}',
                "type": "GET"
            },
            aoColumnDefs:[
                {
                    orderable: false,
                    bSortable: false,
                    render: function ( data, type, row ) {
                        return '<input type="checkbox" '  + ' id="' + row.id + '" class="select_item magic-checkbox"/>' +
                               '<label class="pull-left"' + ' for="' + row.id +'"></label>';
                    },
                    aTargets: [0]
                },
                {
                    mData: "id",
                    aTargets: [1]
                },
                {
                    mData: "first_name",
                    aTargets: [2]
                },
                {
                    mData: "last_name",
                    aTargets: [3]
                },
                {
                    mData: "phone_number",
                    aTargets: [4]
                },
                {
                    mData: "email",
                    aTargets: [5]
                },
                {
                    orderable: false,
                    bSortable: false,
                    render: function ( data, type, row ) {
                        return '<a href="{{route('customer.postDelete',2)}}" class="btn btn-xs btn-white m-l-xs m-r-xxs"><i class="fa fa-trash"></i> {{trans('labels.label.common.btnDelete')}}</a>' +
                               '<a class="btn btn-xs btn-primary m-l-xs m-r-xxs"><i class="fa fa-pencil"></i> {{trans('labels.label.common.btnEdit')}}</a>';
                    },
                    aTargets: [6]
                },
            ],
        });
    </script>
    <script src="{{url('assets/js/modules/customer.js')}}"></script>
@endsection