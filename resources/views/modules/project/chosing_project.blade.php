@extends('layouts.main')
@section('title', trans('messages.title.home.dashboard'))

@section('breadcrumb')
    <h2>@lang('messages.label.project.chosing.title')</h2>
    {{--<ol class="breadcrumb">--}}
        {{--<li>--}}
            {{--<a href="index.html">@lang('messages.label.common.home')</a>--}}
        {{--</li>--}}
        {{--<li>--}}
            {{--<a href="#">@lang('messages.label.project.chosing.route-project')</a>--}}
        {{--</li>--}}
        {{--<li class="active">--}}
            {{--<strong>@lang('messages.label.project.chosing.route-chosing')</strong>--}}
        {{--</li>--}}
    {{--</ol>--}}
@endsection

@section('content')

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox-title">
                    <h5 style="color: blue;">{{ trans('messages.label.project.chosing.chosingProject') }}:
                        <span style="color: red;">7 @lang('messages.label.project.chosing.project')</span>
                    </h5>
                </div>
                <div class="scroll_content">
                    <div class="ibox-content">

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="chosing-table">
                                {{--<thead>--}}
                                {{--<tr>--}}
                                {{--<th>ID</th>--}}
                                {{--<th>Date</th>--}}
                                {{--<th>Project</th>--}}
                                {{--<th>Prepare</th>--}}
                                {{--<th>Doing</th>--}}
                                {{--<th>Cancel</th>--}}
                                {{--</tr>--}}
                                {{--</thead>--}}
                                <tbody>
                                @for($i=0; $i<7; $i++)
                                    <tr onclick="link('{{ route('project.edit', $i) }}')" class="grade_{{ $i }}">
                                        <td class="center">{{ $i+1 }}</td>
                                        <td>2017/4/25 9:30</td>
                                        <td>本田</td>
                                        <td>ABC株式会社</td>
                                        <td>ABCゲームアプリメールサポート</td>
                                        <td class="center">
                                            <span class="text-success m-r">P札 C博</span>
                                            <span class="text-navy m-r">P東 P名</span>
                                            <span class="text-danger m-r">P岐　P北　C沖</span>
                                            <span class="text-primary m-r">C仙　C岐　C東</span>
                                        </td>
                                    </tr>
                                    @if($i==2)
                                        <tr onclick="link('{{ route('project.edit', $i) }}')" class="grade_{{ $i }}"
                                            style="background-color: #ed5565; color: white !important;   ">
                                            <td class="center">3</td>
                                            <td>2017/4/25 9:30</td>
                                            <td>本田</td>
                                            <td>ABC株式会社</td>
                                            <td>ABCゲームアプリメールサポート</td>
                                            <td class="center">
                                                <span class="m-r">P札 C博</span>
                                                <span class="m-r">P東 P名</span>
                                                <span class="m-r">P岐　P北　C沖</span>
                                                <span class="m-r">C仙　C岐　C東</span>
                                            </td>
                                        </tr>
                                    @endif
                                @endfor
                                </tbody>
                                {{--<tfoot>--}}
                                {{--<tr>--}}
                                {{--<th>ID</th>--}}
                                {{--<th>Date</th>--}}
                                {{--<th>Project</th>--}}
                                {{--<th>Prepare</th>--}}
                                {{--<th>Doing</th>--}}
                                {{--<th>Cancel</th>--}}
                                {{--</tr>--}}
                                {{--</tfoot>--}}
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Canceled Project-->
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5 style="color: blue;">@lang('messages.label.project.chosing.endProject')</h5>
                    </div>
                    <div class="scroll_content">
                        <div class="ibox-content">

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table- table-hover" id="end-table">
                                    <tbody>
                                    <tr class="grade_1" onclick="link('{{ route('project.edit', 1) }}')">
                                        <td class="center">1</td>
                                        <td>2017/4/25 9:30</td>
                                        <td>本田</td>
                                        <td>ABC株式会社</td>
                                        <td>ABCゲームアプリメールサポート</td>
                                        <td class="center">
                                            <span class="text-success m-r">P札</span>
                                            <span class="center text-primary">
                                                [@lang('messages.label.project.chosing.undefined')]
                                            </span>
                                        </td>
                                    </tr>
                                    <tr class="grade_2" onclick="link('{{ route('project.edit', 2) }}')">
                                        <td class="center">2</td>
                                        <td>2017/4/25 9:30</td>
                                        <td>本田</td>
                                        <td>ABC株式会社</td>
                                        <td>ABCゲームアプリメールサポート</td>
                                        <td class="center">
                                            <span class="text-success m-r">P札</span>
                                            <span class="center text-primary">
                                                [@lang('messages.label.project.chosing.received')]
                                            </span>
                                        </td>
                                    </tr>
                                    <tr class="grade_3" onclick="link('{{ route('project.edit', 3) }}')">
                                        <td class="center">3</td>
                                        <td>2017/4/25 9:30</td>
                                        <td>本田</td>
                                        <td>ABC株式会社</td>
                                        <td>ABCゲームアプリメールサポート</td>
                                        <td class="center">
                                            <span class="text-success m-r">P札</span>
                                            <span class="center text-primary">
                                                [@lang('messages.label.project.chosing.loss')]
                                            </span>
                                        </td>
                                    </tr>
                                    <tr class="grade_4" onclick="link('{{ route('project.edit', 4) }}')">
                                        <td class="center">4</td>
                                        <td>2017/4/25 9:30</td>
                                        <td>本田</td>
                                        <td>ABC株式会社</td>
                                        <td>ABCゲームアプリメールサポート</td>
                                        <td class="center">
                                            <span class="text-success m-r">P札</span>
                                            <span class="center text-primary">
                                                [@lang('messages.label.project.chosing.received')]
                                            </span>
                                        </td>
                                    </tr>
                                    <tr class="grade_5" onclick="link('{{ route('project.edit', 5) }}')">
                                        <td class="center">5</td>
                                        <td>2017/4/25 9:30</td>
                                        <td>本田</td>
                                        <td>ABC株式会社</td>
                                        <td>ABCゲームアプリメールサポート</td>
                                        <td class="center">
                                            <span class="text-success m-r">P札</span>
                                            <span class="center text-primary">
                                                [@lang('messages.label.project.chosing.loss')]
                                            </span>
                                        </td>
                                    </tr>
                                    <tr class="grade_6" onclick="link('{{ route('project.edit', 6) }}')">
                                        <td class="center">6</td>
                                        <td>2017/4/25 9:30</td>
                                        <td>本田</td>
                                        <td>ABC株式会社</td>
                                        <td>ABCゲームアプリメールサポート</td>
                                        <td class="center">
                                            <span class="text-success m-r">P札</span>
                                            <span class="center text-primary">
                                                [@lang('messages.label.project.chosing.loss')]
                                            </span>
                                        </td>
                                    </tr>
                                    <tr class="grade_7" onclick="link('{{ route('project.edit', 7) }}')">
                                        <td class="center">7</td>
                                        <td>2017/4/25 9:30</td>
                                        <td>本田</td>
                                        <td>ABC株式会社</td>
                                        <td>ABCゲームアプリメールサポート</td>
                                        <td class="center">
                                            <span class="text-success m-r">P札</span>
                                            <span class="center text-primary">
                                                [@lang('messages.label.project.chosing.loss')]
                                            </span>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--<div class="row m-t-md">--}}
    {{--<button class="ladda-button ladda-button-demo btn btn-primary" data-style="zoom-in">Send</button>--}}
    {{--<p class="result"></p>--}}
    {{--</div>--}}
    {{--<meta name="csrf-token" content="{{ csrf_token() }}">--}}
@endsection

@section('extend-js')
    <script>

        $(document).ready(function () {

            // Add slimscroll to element
            $('.scroll_content').slimscroll({
                height: '200px'
            });

            var l = $('.ladda-button-demo').ladda();

            l.click(function () {
                var start_time = new Date().getTime();
                // Start loading
                l.ladda('start');
                var request_time = 0;

                // Timeout example
                // Do something in backend and then stop ladda
                setTimeout(function () {
                    $.ajax({
                        url: '/send-mail',
                        type: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: '',
                        success: function (result) {
                            var message = result['response'];
                            $('.result').html(message.replace(/\"/g, ""));
                            request_time = new Date().getTime() - start_time;
                            return;
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            console.log(JSON.stringify(jqXHR));
                            console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                            $('.result').html("Occured errors!!!");
                        }
                    });
                    l.ladda('stop');
                }, 5000)


            });


        });

        function link(url) {
            window.location.href = url;
        }
    </script>

    <!-- Ladda -->
    <script src="{{ asset('assets/js/plugins/ladda/spin.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/ladda/ladda.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/ladda/ladda.jquery.min.js') }}"></script>


@endsection

@section('extend-css')
    <!-- Ladda style -->
    <link href="{{ asset('assets/css/plugins/ladda/ladda-themeless.min.css') }}" rel="stylesheet">
    <style>
        .ibox-content {
            padding: 0 0 0 0 !important;
        }

        #chosing-table, #end-table {
            margin-bottom: 0 !important;
        }

        #chosing-table tr:hover, #end-table tr:hover {
            cursor: pointer;
        }
    </style>
@endsection
