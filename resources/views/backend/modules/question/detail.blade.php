@extends('backend.layout.main')
@section('title')
    Detail Company
@endsection

@section('extend-css')

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
            <strong>Detail</strong>
        </li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox-content">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Name:</label>
                        <label class="col-sm-10 control-label">{{ $company->company_name }}</label>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Address:</label>
                        <label class="col-sm-10 control-label">{{ $company->company_address }}</label>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Mobile:</label>
                        <label class="col-sm-10 control-label">{{ $company->company_mobile }}</label>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Email:</label>
                        <label class="col-sm-10 control-label">{{ $company->company_email }}</label>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Website:</label>
                        <label class="col-sm-10 control-label">{{ $company->company_website }}</label>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Representative Name:</label>
                        <label class="col-sm-10 control-label">{{ $company->representative_name }}</label>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Representative Mobile:</label>
                        <label class="col-sm-10 control-label">{{ $company->representative_mobile }}</label>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-6 col-sm-offset-5">
                            <a class="btn btn-warning" href="{{ route('company.edit', ['id' => $company->id]) }}" role="button"><i class="fa fa-edit"></i>Edit</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('extend-js')

@endsection