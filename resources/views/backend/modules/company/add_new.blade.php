@extends('backend.layout.main')
@section('title')
    New Company
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
        <li>
            <a href="{{ route('company.getAllCompanies') }}">Company</a>
        </li>
        <li class="active">
            <strong>Add new</strong>
        </li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>New Company</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <form action="{{ route('company.postNew') }}" method="post" class="form-horizontal">
                        {!! csrf_field() !!}
                        {!! $messages !!}
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="company_name" value="{{ $company->company_name }}"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Address</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="company_address" value="{{ $company->company_address }}"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Mobile</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="company_mobile" value="{{ $company->company_mobile }}"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="company_email" value="{{ $company->company_email }}"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Website</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="company_website" value="{{ $company->company_website }}"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Respresentative Name</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="representative_name" value="{{ $company->representative_name }}"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Respresentative Mobile</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="representative_mobile" value="{{ $company->representative_mobile }}"></div>
                        </div>

                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <div class="col-sm-2 col-sm-offset-10">
                                <a class="btn btn-white" href="{{ route('company.getAllCompanies') }}" role="button">Back</a>
                                @if($option == 'add')
                                    <button class="btn btn-primary" type="submit">Add</button>
                                @else
                                    <button class="btn btn-danger" type="submit">Edit</button>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('extend-js')


@endsection