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
                            <div class="col-sm-10"><input type="text" class="form-control" name="company_name" value="{{ old('company_name') }}"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Address</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="company_address" value="{{ old('company_address') }}"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Mobile</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="company_mobile" value="{{ old('company_mobile') }}"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="company_email" value="{{ old('company_email') }}"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Website</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="company_website" value="{{ old('company_website') }}"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Respresentative Name</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="representative_name" value="{{ old('representative_name') }}"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Respresentative Mobile</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="representative_mobile" value="{{ old('representative_mobile') }}"></div>
                        </div>

                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-4">
                                <a class="btn btn-white" href="#" role="button">Cancel</a>
                                <button class="btn btn-primary" type="submit">Create New</button>
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