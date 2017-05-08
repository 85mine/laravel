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
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($companies as $key => $company)
                                    <tr class="gradeX">
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $company->company_name }}</td>
                                        <td>{{ $company->company_address }}                                        </td>
                                        <td>{{ $company->company_mobile }}</td>
                                        <td>{{ $company->company_email }}</td>
                                        <td>{{ $company->company_website }}</td>
                                        <td class="center">{{ $company->representative_name }}</td>
                                        <td class="center">{{ $company->representative_mobile }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Mobile</th>
                                    <th>Email</th>
                                    <th>Website</th>
                                    <th>Respresentative Name</th>
                                    <th>Respresentative Mobile</th>
                                </tr>
                                </tfoot>

                            </table>
                            {{ $companies->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('extend-js')
    <script src="{{ URL::asset('assets/js/plugins/dataTables/datatables.min.js') }}"></script>

    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function () {
            $('.dataTables-example').DataTable({
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

        });

    </script>

@endsection