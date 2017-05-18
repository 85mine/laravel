@extends('backend.layout.main')
@section('title')
    {{trans('labels.title.customer.customers')}}
@endsection

@section('extend-css')
    @include('backend.layout.sml-table.header')
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
                        {!! $messages !!}
                        {{--Add/Delete Button--}}
                        <div class="over-hidden bulk-action">
                            <a href="{{ route('customer.postDelete') }}" class="btn btn-disable sml-delete-btn" onclick="return false;"><i class="fa fa-fw fa-remove"></i> {{ trans('labels.label.common.btnDelete') }}</a>
                        </div>
                    </div>
                    <div class="sml-box">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables">
                                <thead>
                                <tr>
                                    <th>
                                        <input class="sml-select-all magic-checkbox" type="checkbox" id="btn-select-all">
                                        <label for="btn-select-all"></label>
                                    </th>
                                    <th>{{trans('labels.label.customer.column.first_name')}}</th>
                                    <th>{{trans('labels.label.customer.column.last_name')}}</th>
                                    <th>{{trans('labels.label.customer.column.phone_number')}}</th>
                                    <th>{{trans('labels.label.customer.column.email')}}</th>
                                    <th>{{trans('labels.label.common.action')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                    {{--DataTables--}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="sml-box-footer">

                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! Form::open(array('route' => array('customer.postDelete'), 'method' => 'POST', 'id' => 'sml-form-delete-submit', 'class' => 'form-horizontal')) !!}
    {!! Form::hidden('s_ids', null) !!}
    {!! Form::close() !!}
@endsection

@section('extend-js')
    <!-- dataTables -->
    <script src="{{url('assets/js/plugins/dataTables/datatables.min.js')}}"></script>
    <script src="{{url('assets/js/plugins/jquery-confirm/jquery-confirm.min.js')}}"></script>
    <script type="text/javascript">
        $('.dataTables').DataTable({
            pageLength: 10,
            destroy: true,
            responsive: true,
            processing: true,
            serverSide: true,
            autoWidth: false,
            order: [[1, 'desc']],
            ajax: {
                "url": '{!! route('customer.getAjaxData') !!}',
                "type": "GET"
            },
            aoColumnDefs:[
                {
                    orderable: false,
                    bSortable: false,
                    render: function ( data, type, row ) {
                        return '<input type="checkbox" '  + ' id="input_' + row.id + '" value="' + row.id + '"'+ ' class="sml-select-item magic-checkbox"/>' +
                               '<label class="pull-left"' + ' for="input_' + row.id +'"></label>';
                    },
                    aTargets: [0]
                },
                {
                    mData: "first_name",
                    aTargets: [1]
                },
                {
                    mData: "last_name",
                    aTargets: [2]
                },
                {
                    mData: "phone_number",
                    aTargets: [3]
                },
                {
                    mData: "email",
                    aTargets: [4]
                },
                {
                    orderable: false,
                    bSortable: false,
                    render: function ( data, type, row ) {
                        return '<a name="del_' + row.id + '" class="btn btn-xs btn-white m-l-xs m-r-xxs sml-select-item-delete"><i class="fa fa-trash"></i> {{trans('labels.label.common.btnDelete')}}</a>' +
                               '<a href="{{route('customer.get.edit')}}/' + row.id + '" class="btn btn-xs btn-primary m-l-xs m-r-xxs"><i class="fa fa-pencil"></i> {{trans('labels.label.common.btnEdit')}}</a>';
                    },
                    aTargets: [-1]
                },
                {
                    aTargets: [0, -1],
                    sClass: "text-center"
                },
                {
                    aTargets: [ '_all' ],
                    defaultContent: "",
                }
            ],
        });
    </script>
    @include('backend.layout.sml-table.footer')
    <script src="{{url('assets/js/sml-table.js')}}"></script>
@endsection