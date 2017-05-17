$(document).ready(function () {
    $('.i-checks').iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-green',
    });

    var page = $('.question').attr("id");
    $('.question_' + page).removeClass("hidden");
    var max_page = $('.max_page').val();

    $('.btn_' + page).removeClass("btn-default");
    $('.btn_' + page).addClass("btn-primary");

    $('.btn-next').click(function () {
        var listCheck = [];
        console.log($("input[name='answer[]']"));
        $("input[name='answer_" + page + "[]']:checked").each(function () {
//                    console.log($(this).val());
            listCheck.push($(this).val());
        });
        // console.log(listCheck);
        if (page <= max_page) {
            if (listCheck.length > 1 && listCheck.length < 5) {
                $('.question_' + page).addClass("hidden");
                $('.btn_' + page).removeClass("btn-primary");
                $('.btn_' + page).addClass("btn-default");
                ++page;
                $('.question_' + page).removeClass("hidden");
                $('.label').html("");
                if (page == max_page + 1) {
                    page = max_page + 1;
                    $('.btn-next').addClass("hide");
                    $('.btn-submit').removeClass("hide");
                    $('.btn-prev').removeClass("hide");
                } else {
                    $('.btn-prev').removeClass("hide");
                    $('.btn_' + page).removeClass("btn-default");
                    $('.btn_' + page).addClass("btn-primary");
                }
            } else {
                $('.label').html("Allow to choose 2-4 values");
            }
        } else {
            $('.question').addClass("hidden");
            $('.show-warning').removeClass("hidden");
            $('.btn-submit').removeClass("hide");
            $('.btn-next').addClass("hide");
            $('.btn_' + page).removeClass("btn-primary");
            $('.btn_' + page).addClass("btn-default");
            $('.btn_end').removeClass("btn-default");
            $('.btn_end').addClass("btn-danger");
        }
    });

    $('.btn-prev').click(function () {
        $('.question_' + page).addClass("hidden");
        $('.btn_' + page).removeClass("btn-primary");
        $('.btn_' + page).addClass("btn-default");
        page--;
        $('.question_' + page).removeClass("hidden");
        $('.label').html("");
        $('.show-warning').addClass('hidden');

        if (page == 1) {
            page = 1;
            $('.btn-next').removeClass("hide");
            $('.btn-prev').addClass("hide");
        } else {
            $('.btn-next').removeClass("hide");
            $('.btn-submit').addClass("hide");
        }
        $('.btn_' + page).removeClass("btn-default");
        $('.btn_' + page).addClass("btn-primary");
    });

    // $('.btn').click(function() {
    //     $('.question_' + page).addClass("hidden");
    //     $('.btn_'+ page).removeClass("btn-primary");
    //     $('.btn_'+ page).addClass("btn-default");
    //     var idButton = $(this).attr("id");
    //     page = idButton;
    //     $('.question_' + page).removeClass("hidden");
    //     $('.btn_'+ page).removeClass("btn-default");
    //     $('.btn_'+ page).addClass("btn-primary");
    // });

});