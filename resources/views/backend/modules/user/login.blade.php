@extends('backend.layout.main_before_login')
@section('title', trans('labels.title.user.login'))

@section('content')
<div class="middle-box text-center loginscreen animated fadeInDown">
    <div class="login-form">
        <div class="title">
            <h2>{{ trans('messages.user.login.welcome') }}</h2>
        </div>
        <form class="m-t" role="form" action="{{route('user.postLogin')}}" method="post">
            {!! csrf_field() !!}
            {!! $messages !!}
            <div class="form-group">
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="{{trans('labels.placeholder.user.login.username')}}" >
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="{{trans('labels.placeholder.user.login.password')}}" >
            </div>
            <button type="submit" class="btn btn-primary block full-width m-b">{{trans('labels.label.common.login')}}</button>

            {{--<a href="#"><small>Forgot password?</small></a>--}}
        </form>
    </div>
</div>
@endsection