<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ trans('messages.title.common') }} | @yield('title')</title>

    <link href="{{url('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{url('assets/css/animate.css')}}" rel="stylesheet">
    <link href="{{url('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{url('assets/css/custom.css')}}" rel="stylesheet">
    @yield('extend-css')
</head>

<body class="top-navigation">

<div id="wrapper">
    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom white-bg">
            <!-- Include sidebar top -->
            @include('layouts.main.sidebar_top')
            <!-- End include side bar top -->
        </div>
        <div class="wrapper wrapper-content">
            <div class="container">
                <div class="row wrapper border-bottom white-bg page-heading">
                    <div class="col-lg-10">
                        @yield('breadcrumb')
                    </div>
                    <div class="col-lg-2">
                    </div>
                </div>
                &nbsp;
                <div class="row">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <div>
                {!! trans('messages.message.common.copyright') !!}
            </div>
        </div>

    </div>
</div>


<!-- Mainly scripts -->
<script src="{{url('assets/js/jquery-3.1.1.min.js')}}"></script>
<script src="{{url('assets/js/bootstrap.min.js')}}"></script>
<script src="{{url('assets/js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
<script src="{{url('assets/js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

<!-- Custom and plugin javascript -->
<script src="{{url('assets/js/inspinia.js')}}"></script>
<script src="{{url('assets/js/plugins/pace/pace.min.js')}}"></script>
<script src="{{url('assets/js/plugins/select2/select2.full.min.js')}}"></script>
<script src="{{url('assets/js/plugins/select2/i18n/ja.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $(".select2").select2({
            language: '{{ env('APP_LOCALE') ? env('APP_LOCALE') : 'ja' }}'
        });
    });
</script>
@yield('extend-js')

</body>

</html>
