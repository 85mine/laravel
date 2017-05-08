@extends('backend.layout.main_before_login')
@section('title', trans('labels.title.user.active_email'))

@section('content')
    <div class="passwordBox animated fadeInDown">
        <div class="row">
            <div class="col-md-12">
                <div class="ibox-content">
                    <h2 class="font-bold">{{ trans('labels.title.user.active_email') }}</h2>
                    <p>
                        {{ trans('labels.label.user.active_email.description') }}
                    </p>
                    <div class="row">
                        <div class="col-lg-12">
                            <form class="m-t" role="form" action="{{ route('user.postActiveEmail') }}" method="post">
                                {!! csrf_field() !!}
                                <button type="submit" class="btn btn-primary block full-width m-b">{{ trans('labels.label.user.active_email.send_email') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection