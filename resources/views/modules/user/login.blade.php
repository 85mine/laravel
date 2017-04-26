@extends('layouts.main_before_login')
@section('title', trans('messages.title.user.login'))

@section('content')
<div class="login-form">
    <div class="title">
        <h3>{{ trans('messages.message.user.login.selectSystem') }}</h3>
    </div>
    <h2>{{ trans('messages.message.user.login.answerSystem') }}</h2>
    <form class="m-t" role="form" action="{{route('user.postLogin')}}" method="post">
        {!! csrf_field() !!}
        {!! $messages !!}
        <div class="form-group">
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="{{trans('messages.placeholder.user.login.username')}}" >
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="{{trans('messages.placeholder.user.login.password')}}" >
        </div>
        <button type="submit" class="btn btn-primary block full-width m-b">{{trans('messages.label.common.login')}}</button>

        {{--<a href="#"><small>Forgot password?</small></a>--}}
    </form>
</div>
@endsection