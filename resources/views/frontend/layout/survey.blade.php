@extends('frontend.layout.main')

@section('extend-css')
    <link href="{{ url('assets/css/plugins/iCheck/custom.css') }}" rel="stylesheet">
    <link href="{{ url('assets/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css') }}"
          rel="stylesheet">

@endsection

@section('content')

    <div id="survey">
        <div class="col-lg-12">
            <div class="ibox-content">
                <h2>Survey</h2>
                @foreach($questions as $key => $question)
                    <div class="question">
                        <p>Question <span class="number-question"></span>: {{ $question->content }}</p>
                        <ul class="todo-list m-t">
                            @foreach(json_decode($question->answer) as $i=> $answer)
                                <li>
                                    <input type="checkbox" value="{{ $answer }}"
                                           name="answer[]" class="i-checks answer"/>
                                    <span class="m-l-xs">{{ $answer }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
                <p class="text-center"><span class="label label-warning"></span></p>
                <button class="btn btn-primary btn-rounded btn-block btn-submit hide" type="button">Submit</button>
                <button class="btn btn-primary btn-rounded btn-block btn-next" type="button">Next</button>
                <button class="btn btn-danger btn-rounded btn-block btn-prev" type="button">Prev</button>
                <input type="hidden" value="{{ $questions->total() }}" name="max_page" class="max_page">
            </div>
        </div>
    </div>
@endsection

@section('extend-js')
    <!-- iCheck -->
    <script src="{{ url('assets/js/plugins/iCheck/icheck.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });

            var page = window.location.href.split('page=')[1];
            var maxPage = $('.max_page').val();
            if(isNaN(page) || page == 0 || page == 1) {
                page = 1;
                $('.number-question').html(1);
                $('.btn-prev').css("display", "none");
            }else if(page == maxPage) {
                $('.number-question').html(page);
                $('.btn-prev').css("display");
                $('.btn-submit').removeClass("hide");
                $('.btn-next').css("display", "none");
            }else {
                $('.number-question').html(page);
                $('.btn-prev').css("display");
            }

            $('.btn-next').click(function() {

                var listCheck = [];
                console.log($("input[name='answer[]']"));
                $("input[name='answer[]']:checked").each(function() {
                    console.log($(this).val());
                    listCheck .push($(this).val());
                });
                console.log(listCheck);
                if(listCheck.length > 1 && listCheck.length < 5) {
                    if(!isNaN(page) && page < maxPage) {
                        window.location.href = "{{ route('survey') }}" + "?page=" + ++page;
                    }
                }else{
                    $('.label').html("Allow to choose 2-4 values");
                }

            });

            $('.btn-prev').click(function() {

                if(!isNaN(page) && page > 0) {
                    window.location.href = "{{ route('survey') }}" + "?page=" + --page;
                }
            });

            $('.btn-submit').click(function() {
                alert("submit form");
            });
        });
    </script>
@endsection