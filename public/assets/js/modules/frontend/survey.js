$(document).ready(function () {
    $('.i-checks').iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-green',
    });

    var page = $('.question').attr("id");
    $('.question_' + page).removeClass("hidden");

    var max_page = $('.max_page').val();

    $('.btn-next').click(function () {
        var listCheck = [];
        console.log($("input[name='answer[]']"));
        $("input[name='answer_" + page + "[]']:checked").each(function () {
//                    console.log($(this).val());
            listCheck.push($(this).val());
        });
        console.log(listCheck);
        if (listCheck.length > 1 && listCheck.length < 5) {
            $('.question_' + page).addClass("hidden");
            page++;
            $('.question_' + page).removeClass("hidden");
            $('.label').html("");

            if (page == max_page) {
                page = max_page;
                $('.btn-next').addClass("hide");
                $('.btn-submit').removeClass("hide");
                $('.btn-prev').removeClass("hide");
            } else {
                $('.btn-prev').removeClass("hide");
            }
        } else {
            $('.label').html("Allow to choose 2-4 values");
        }
    });

    $('.btn-prev').click(function () {
        $('.question_' + page).addClass("hidden");
        page--;
        $('.question_' + page).removeClass("hidden");
        $('.label').html("");

        if (page == 1) {
            page = 1;
            $('.btn-next').removeClass("hide");
            $('.btn-prev').addClass("hide");
        } else {
            $('.btn-next').removeClass("hide");
            $('.btn-submit').addClass("hide");
        }
    });

});