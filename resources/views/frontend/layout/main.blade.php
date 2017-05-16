<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ trans('labels.title.common') }} | @yield('title')</title>

        <link href="{{url('assets/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{url('assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
        <link href="{{url('assets/css/animate.css')}}" rel="stylesheet">
        @yield('extend-css')
        <link href="{{url('assets/css/style.css')}}" rel="stylesheet">
        <link href="{{url('assets/css/custom.css')}}" rel="stylesheet">
    </head>

    <body>

        @yield('content')

        <!-- Mainly scripts -->
        <script src="{{url('assets/js/jquery-3.1.1.min.js')}}"></script>
        <script src="{{url('assets/js/bootstrap.min.js')}}"></script>
        <script src="{{url('assets/js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
        <script src="{{url('assets/js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

        <!-- Custom and plugin javascript -->
        <script src="{{url('assets/js/inspinia.js')}}"></script>
        <script src="{{url('assets/js/plugins/pace/pace.min.js')}}"></script>

        @yield('extend-js')

    </body>
</html>
