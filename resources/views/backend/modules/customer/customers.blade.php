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
                            <a href="{{ route('customer.getCreate') }}" class="btn btn-success pull-right"><i class="fa fa-fw fa-plus"></i> {{ trans('labels.label.common.btnAddMore') }}</a>
                        </div>
                    </div>
                    <div class="sml-box">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables">
                                <thead>
                                <tr>
                                    <th>
                                        <input class="magic-checkbox" type="checkbox" name="layout" id="inputAll">
                                        <label for="inputAll"></label>
                                    </th>
                                    <th>{{trans('labels.label.customer.column.id')}}</th>
                                    <th>{{trans('labels.label.customer.column.first_name')}}</th>
                                    <th>{{trans('labels.label.customer.column.last_name')}}</th>
                                    <th>{{trans('labels.label.customer.column.phone_number')}}</th>
                                    <th>{{trans('labels.label.customer.column.email')}}</th>
                                    {{--<th>Action</th>--}}
                                </tr>
                                </thead>
                                <tbody>
                                    {{--DataTables--}}
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>
                                        <input class="magic-checkbox" type="checkbox" name="layout" id="inputAll">
                                        <label for="inputAll"></label>
                                    </th>
                                    <th>{{trans('labels.label.customer.column.id')}}</th>
                                    <th>{{trans('labels.label.customer.column.first_name')}}</th>
                                    <th>{{trans('labels.label.customer.column.last_name')}}</th>
                                    <th>{{trans('labels.label.customer.column.phone_number')}}</th>
                                    <th>{{trans('labels.label.customer.column.email')}}</th>
                                    {{--<th>Action</th>--}}
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
                        return '<input type="checkbox" '  + ' id="input' + row.id + '" class="magic-checkbox"/>' +
                               '<label class="pull-left"' + ' for="input' + row.id +'"></label>';
                    },
                    aTargets: [0]
                },
//                {
//                    orderable: false,
//                    bSortable: false,
//                    render: function ( data, type, row ) {
//                        return '<input type="checkbox" '  + ' id="input' + row.id + '" class="magic-checkbox"/>' +
//                            '<label class="pull-left"' + ' for="input' + row.id +'"></label>';
//                    },
//                    aTargets: [5]
//                },
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
            ],
        });
    </script>
@endsection