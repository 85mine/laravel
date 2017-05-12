@extends('backend.layout.main')
@section('title')
    {{trans('labels.title.customer.customers')}}
@endsection

@section('extend-css')
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
                        {{--<h2>--}}{{--HEADING--}}{{--</h2>--}}
                        {{--<div>--}}
                            {{--<label>SHOW</label>--}}
                            {{--<select class="input-sm m-b sml-search-s" name="filter">--}}
                                {{--<option value="10">10</option>--}}
                                {{--<option value="20">20</option>--}}
                            {{--</select>--}}
                            {{--<label>ENTRIES</label>--}}
                        {{--<form method="get" action="/" class="pull-right sml-search-m">--}}
                            {{--<div class="input-group">--}}
                                {{--<input type="text" class="form-control input-sm" name="search" placeholder="Search">--}}
                                {{--<div class="input-group-btn">--}}
                                    {{--<button type="submit" class="btn btn-sm btn-primary">Search</button>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</form>--}}
                        {{--</div>--}}
                        {{--<div class="sml-tools">--}}
                            {{--<button class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="Mark as important"><i class="fa fa-trash-o"></i> Delete</button>--}}
                            {{--<button class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="Move to trash"><i class="fa fa-trash-o"></i> Create</button>--}}
                            {{--<div class="btn-group pull-right">--}}
                                {{--<button type="button" class="btn btn-white"><i class="fa fa-chevron-left"></i></button>--}}
                                {{--<button class="btn btn-white">1</button>--}}
                                {{--<button class="btn btn-white  active">2</button>--}}
                                {{--<button class="btn btn-white">3</button>--}}
                                {{--<button class="btn btn-white">4</button>--}}
                                {{--<button type="button" class="btn btn-white"><i class="fa fa-chevron-right"></i> </button>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    </div>
                    <div class="sml-box">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables">
                                <thead>
                                <tr>
                                    <th>{{trans('labels.label.customer.column.id')}}</th>
                                    <th>{{trans('labels.label.customer.column.first_name')}}</th>
                                    <th>{{trans('labels.label.customer.column.last_name')}}</th>
                                    <th>{{trans('labels.label.customer.column.phone_number')}}</th>
                                    <th>{{trans('labels.label.customer.column.email')}}</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($customers as $customer)
                                        <tr>
                                        <td>{{$customer->id}}</td>
                                        <td>{{$customer->first_name}}</td>
                                        <td>{{$customer->last_name}}</td>
                                        <td>{{$customer->phone_number}}</td>
                                        <td>{{$customer->email}}</td>
                                        <td class="project-actions">
                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                        </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>{{trans('labels.label.customer.column.id')}}</th>
                                    <th>{{trans('labels.label.customer.column.first_name')}}</th>
                                    <th>{{trans('labels.label.customer.column.last_name')}}</th>
                                    <th>{{trans('labels.label.customer.column.phone_number')}}</th>
                                    <th>{{trans('labels.label.customer.column.email')}}</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        {{--<table class="table table-striped table-bordered table-hover dataTables-example" >--}}
                            {{--<thead>--}}
                            {{--<tr>--}}
                                {{--<th>{{trans('labels.label.customer.column.id')}}</th>--}}
                                {{--<th>{{trans('labels.label.customer.column.first_name')}}</th>--}}
                                {{--<th>{{trans('labels.label.customer.column.last_name')}}</th>--}}
                                {{--<th>{{trans('labels.label.customer.column.phone_number')}}</th>--}}
                                {{--<th>{{trans('labels.label.customer.column.email')}}</th>--}}
                                {{--<th>Action</th>--}}
                            {{--</tr>--}}
                            {{--</thead>--}}
                            {{--<tbody>--}}
                            {{--@foreach($customers as $customer)--}}
                                {{--<tr>--}}
                                    {{--<td>{{$customer->id}}</td>--}}
                                    {{--<td>{{$customer->first_name}}</td>--}}
                                    {{--<td>{{$customer->last_name}}</td>--}}
                                    {{--<td>{{$customer->phone_number}}</td>--}}
                                    {{--<td>{{$customer->email}}</td>--}}
                                    {{--<td class="project-actions">--}}
                                        {{--<a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>--}}
                                        {{--<a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>--}}
                                    {{--</td>--}}
                                {{--</tr>--}}
                            {{--@endforeach--}}
                            {{--<tfoot>--}}
                            {{--<tr>--}}
                                {{--<th>{{trans('labels.label.customer.column.id')}}</th>--}}
                                {{--<th>{{trans('labels.label.customer.column.first_name')}}</th>--}}
                                {{--<th>{{trans('labels.label.customer.column.last_name')}}</th>--}}
                                {{--<th>{{trans('labels.label.customer.column.phone_number')}}</th>--}}
                                {{--<th>{{trans('labels.label.customer.column.email')}}</th>--}}
                                {{--<th>Action</th>--}}
                            {{--</tr>--}}
                            {{--</tfoot>--}}
                        {{--</table>--}}
                        {{--<div class="sml-tools">--}}
                            {{--<button class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="Mark as important"><i class="fa fa-trash-o"></i> Delete</button>--}}
                            {{--<button class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="Move to trash"><i class="fa fa-trash-o"></i> Create</button>--}}
                            {{--<div class="btn-group pull-right">--}}
                                {{--<button type="button" class="btn btn-white"><i class="fa fa-chevron-left"></i></button>--}}
                                {{--<button class="btn btn-white">1</button>--}}
                                {{--<button class="btn btn-white  active">2</button>--}}
                                {{--<button class="btn btn-white">3</button>--}}
                                {{--<button class="btn btn-white">4</button>--}}
                                {{--<button type="button" class="btn btn-white"><i class="fa fa-chevron-right"></i> </button>--}}
                            {{--</div>--}}
                            {{--{!! $customers->render() !!}--}}
                        {{--</div>--}}
                    </div>
                    <div class="sml-box-footer">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('extend-js')
    <script src="{{url('assets/js/plugins/dataTables/datatables.min.js')}}"></script>
    <script>
        $('.dataTables').DataTable({
            pageLength: 25,
            responsive: true,
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
                {extend: 'copy'},
                {extend: 'csv'},
                {extend: 'excel', title: 'ExampleFile'},
                {extend: 'pdf', title: 'ExampleFile'},

                {
                    extend: 'print',
                    customize: function (win) {
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '10px');

                        $(win.document.body).find('table')
                            .addClass('compact')
                            .css('font-size', 'inherit');
                    }
                }
            ]

        });
    </script>
@endsection