@extends('backend.layout.main')
@section('title', trans('messages.title.home.dashboard'))

@section('breadcrumb')
    <h2>Layouts</h2>
    <ol class="breadcrumb">
        {{--<li class="active">--}}
            {{--<a href="{{ route('admin.dashboard') }}">Home</a>--}}
        {{--</li>--}}
        <li class="active">
            <strong>Home</strong>
        </li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Company</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach( $accList as $acc)
                            <tr>
                                <td>1</td>
                                <td>{{ $acc->name }}</td>
                                <td>{{ $acc->email }}</td>
                                <td>{{ $acc->status }}</td>
                                <td>@if( $acc->company ) {{ $acc->company->company_name }} @else &nbsp @endif</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection