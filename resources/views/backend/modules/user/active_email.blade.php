@extends('backend.layout.main_before_login')
@section('title', trans('labels.title.user.active_email'))

@section('content')
    <div class="passwordBox animated fadeInDown">
        <div class="row">
            <div class="col-md-12">
                <div class="ibox-content">
                    <h2 class="font-bold">{{ trans('labels.title.user.active_email') }}</h2>
                    @if($check)
                        <br>
                        <h3>
                            {!! str_replace( STRING_REPLACE, route('user.getLogin'), trans('messages.user.confirm_email.active_email_success')) !!}
                        </h3>
                    @else
                        <br>
                        <h3>
                            {!! str_replace( STRING_REPLACE, route('user.getActiveEmail'), trans('messages.user.confirm_email.active_email_error')) !!}
                        </h3>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection