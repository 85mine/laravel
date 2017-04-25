$(document).ready(function () {
    $('#data_5 .input-daterange').datepicker({
        keyboardNavigation: false,
        forceParse: false,
        autoclose: true
    });

    $(".select2").select2();

    c3.generate({
        bindto: '#pie',
        data: {
            columns: [
                ['data1', 19.6],
                ['data2', 29.4],
                ['data3', 51]
            ],
            colors: {
                data1: '#9BBB59',
                data2: '#C0504D',
                data3: '#4F81BD'
            },
            type: 'pie'
        }
    });

    c3.generate({
        bindto: '#stocked1',
        data: {
            columns: [
                ['preparative', 2, 22, 11, 17, 5, 5, 9, 4, 4, 13],
                ['selective', 1, 10, 5, 12, 0, 1, 0, 0, 3, 1]
            ],
            colors: {
                preparative: '#4F81BD',
                selective: '#C0504D'
            },
            type: 'bar',
            groups: [
                ['preparative', 'selective']
            ]
        },
        axis: {
            x: {
                type: 'category',
                categories: ['P東京', 'P札幌', 'P名古屋', 'P岐阜', 'P北九州', 'C東京', 'C仙台', 'C岐阜', 'C博多', 'C沖縄']
            }
        }
    });

    c3.generate({
        bindto: '#stocked2',
        data: {
            columns: [
                ['undefined', 1, 7, 6, 9, 0, 0, 1, 0, 1, 0],
                ['accepting_orders', 0, 5, 1, 2, 0, 1, 0, 0, 1, 0],
                ['loss_orders', 0, 1, 5, 5, 0, 2, 0, 0, 1, 1]

            ],
            colors: {
                undefined: '#4F81BD',
                accepting_orders: '#C0504D',
                loss_orders: '#9BBB59'
            },
            type: 'bar',
            groups: [
                ['undefined', 'accepting_orders', 'loss_orders']
            ]
        },
        axis: {
            x: {
                type: 'category',
                categories: ['P東京', 'P札幌', 'P名古屋', 'P岐阜', 'P北九州', 'C東京', 'C仙台', 'C岐阜', 'C博多', 'C沖縄']
            }
        }
    });
});