@extends('frontend.layout.main')

@section('content')

    <div id="survey">
        <strong>Your result is: <span class="result">
        @if(Session::has('marks["design"]'))
                    {!! Session::get('marks["design"]') !!}
                @endif
        </span>
        </strong>
        <div class="col-lg-12">
            <div class="ibox-content">
                <div>
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('extend-js')
    <!-- ChartJS-->
    <script src="{{ url('assets/js/plugins/chartJs/Chart.min.js') }}"></script>
    <script src="{{ url('assets/js/demo/chartjs-demo.js') }}"></script>
    <script>
        var ctx = document.getElementById("myChart");
        var data = {
            labels: ["Design", "Space", "Request", "Function", "Purpose"],
            datasets: [
                {
                    label: "My First dataset",
                    backgroundColor: "rgba(179,181,198,0.2)",
                    borderColor: "rgba(179,181,198,1)",
                    pointBackgroundColor: "rgba(179,181,198,1)",
                    pointBorderColor: "#fff",
                    pointHoverBackgroundColor: "#fff",
                    pointHoverBorderColor: "rgba(179,181,198,1)",
                    data: [
                        {!! Session::get('mark_design') !!},
                        {!! Session::get('mark_space') !!},
                        {!! Session::get('mark_request') !!},
                        {!! Session::get('mark_function') !!},
                        {!! Session::get('mark_purpose') !!},
                    ]
                },
                {
                    label: "My Second dataset",
                    backgroundColor: "rgba(255,99,132,0.2)",
                    borderColor: "rgba(255,99,132,1)",
                    pointBackgroundColor: "rgba(255,99,132,1)",
                    pointBorderColor: "#fff",
                    pointHoverBackgroundColor: "#fff",
                    pointHoverBorderColor: "rgba(255,99,132,1)",
                    data: [28, 48, 40, 19, 96]
                }
            ]
        };
        var myChart = new Chart(ctx, {
            type: 'radar',
            data: data,
            options: {
                scale: {
                    ticks: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection