@extends('backend.layout.main')
@section('title')
    Company
@endsection

@section('extend-css')
    <link href="{{ URL::asset('assets/css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
@endsection

@section('breadcrumb')
    <h2>Company Management</h2>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.dashboard') }}">Home</a>
        </li>
        <li class="active">
            <strong>Company</strong>
        </li>
    </ol>
@endsection

@section('content')
    {!! $messages !!}
    <a class="btn btn-primary" href="{{ route('company.addNew') }}" role="button"><i class="fa fa-plus"></i> Add New</a>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>All Companies</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Mobile</th>
                                    <th>Email</th>
                                    <th>Website</th>
                                    <th>Respresentative Name</th>
                                    <th>Respresentative Mobile</th>
                                    <th>Options</th>
                                </tr>
                                </thead>
                                <tbody>
                                {{--{{ dd($companies) }}--}}
                                @foreach($companies as $key => $company)
                                    <tr class="company" id="{{ $company->id }}">
                                        <td>{{ $companies->perPage() * $companies->currentPage() + ++$key }}</td>
                                        <td>{{ $company->company_name }}</td>
                                        <td>{{ $company->company_address }}</td>
                                        <td>{{ $company->company_mobile }}</td>
                                        <td>{{ $company->company_email }}</td>
                                        <td>{{ $company->company_website }}</td>
                                        <td class="center">{{ $company->representative_name }}</td>
                                        <td class="center">{{ $company->representative_mobile }}</td>
                                        <td>
                                            <a role="button" href="{{ route('company.detail', ['id' => $company->id]) }}" class="btn btn-info"><i class="fa fa-eye"></i></a>
                                            <a role="button" href="{{ route('company.edit', ['id' => $company->id]) }}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                            <a role="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-{{ $company->id }}"><i class="fa fa-remove"></i></a>
                                            {{--<button class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-{{ $company->id }}"><i class="fa fa-trash"></i></button>--}}
                                            <!--Modal delete-->
                                            <div class="modal inmodal" id="modal-delete-{{ $company->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content animated bounceInRight">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                            <h4 class="modal-title">Are you sure to delete the company?</h4>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-white" data-dismiss="modal">Cancel</button>
                                                            <a role="button" href="{{ route('company.delete', ['id' => $company->id]) }}" class="btn btn-danger" id="{{ $company->id }}">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                </tfoot>

                            </table>
                            {{ $companies->links() }}
                        </div>
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('extend-js')
    <script src="{{ URL::asset('assets/js/plugins/dataTables/datatables.min.js') }}"></script>

    <!-- Page-Level Scripts -->
    {{--<script>--}}
        {{--$(document).ready(function () {--}}

            {{--//View the company--}}
            {{--$('.btn-info').click(function () {--}}
                {{--var id = $(this).closest("tr").attr("id");--}}
                {{--window.location = '/company/' + id + '/detail';--}}
            {{--});--}}

            {{--//Delete the company--}}
            {{--$('.modal .btn-danger').click(function () {--}}
                {{--var id = $(this).attr("id");--}}
                {{--$.ajax({--}}
                    {{--type: 'post',--}}
                    {{--url: '{{ URL::route('company.delete', []) }}',--}}
                    {{--headers: {--}}
                        {{--'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
                    {{--},--}}
                    {{--data: {'id': id},--}}
                    {{--success: function( msg ) {--}}
                        {{--if ( msg.status === 'success' ) {--}}
                            {{--alert( msg.msg + msg.isDeleted);--}}
                            {{--setInterval(function() {--}}
                                {{--window.location.reload();--}}
                            {{--}, 3000);--}}
                        {{--}else{--}}
                            {{--alert( msg.msg );--}}
                        {{--}--}}
                    {{--},--}}
                    {{--error: function( data ) {--}}
                        {{--if ( data.status === 422 ) {--}}
                            {{--alert('Can not delete the category');--}}
                        {{--}--}}
                    {{--}--}}
                {{--});--}}
            {{--});--}}

        {{--});--}}
    {{--</script>--}}

@endsection