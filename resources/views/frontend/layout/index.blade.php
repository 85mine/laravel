@extends('frontend.layout.main')

@section('extend-css')

@endsection

@section('content')
    <div id="centered">
        <a href="{{ route('survey') }}" role="button" class="btn btn-primary btn-lg btn-rounded">Start</a>
    </div>
@endsection

@section('extend-js')
    <script>
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green'
        });
    </script>
@endsection