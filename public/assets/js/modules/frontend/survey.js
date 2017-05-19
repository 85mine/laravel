$(document).ready(function () {
    $('.i-checks').iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-green',
    });

    var page = $('.question').attr("class").split("question_")[1];
    var question_id = $('.question').attr("id");
    $('.question_' + page).removeClass("hidden");
    var max_page = $('.max_page').val();

    $('.btn_' + page).removeClass("btn-default");
    $('.btn_' + page).addClass("btn-primary");

    $('.btn-next').click(function () {
        var listCheck = [];
        $("input[name='questions[" + question_id + "]" + "[]']:checked").each(function () {
//                    console.log($(this).val());
            listCheck.push($(this).val());
        });
        console.log(listCheck);
        $('.label').html("");
        if (page <= max_page) {
            if (listCheck.length > 1 && listCheck.length < 5) {
                $('.question_' + page).addClass("hidden");
                $('.btn-next').addClass('hide');
                $('.btn_' + page).removeClass("btn-primary");
                $('.btn_' + page).addClass("btn-default");
                page++;
                $('.btn-prev').removeClass('hide');
                if (page > max_page) {
                    $('.question_' + max_page).addClass("hidden");
                    $('.btn-next').addClass("hide");
                    $('.btn-submit').removeClass("hide");
                    $('.btn-prev').removeClass("hide");
                    $('.show-warning').removeClass("hidden");
                    $('.btn_' + page).removeClass("btn-primary");
                    $('.btn_' + page).addClass("btn-default");
                    $('.btn_end').addClass("btn-danger");
                    page = parseInt(max_page) + parseInt("1");
                } else {
                    $('.question_' + page).removeClass("hidden");
                    $('.btn-next').removeClass("hide");
                    $('.btn_' + page).removeClass("btn-default");
                    $('.btn_' + page).addClass("btn-primary");
                    question_id = $('.question_' + page).attr("id");
                }
            } else {
                $('.label').html("Allow to choose 2-4 answers for each question!");
            }
        }
    });

    $('.btn-prev').click(function () {
        if (page > max_page) {
            $('.show-warning').addClass("hidden");
            $('.btn-submit').addClass("hide");
            page--;
            $('.question_' + page).removeClass("hidden");
            $('.btn-next').removeClass("hide");
            $('.btn_' + page).removeClass("btn-default");
            $('.btn_' + page).addClass("btn-primary");
        } else {
            $('.question_' + page).addClass("hidden");
            $('.btn_' + page).removeClass("btn-primary");
            $('.btn_' + page).addClass("btn-default");
            page--;
            $('.question_' + page).removeClass("hidden");
            if (page == 1) {
                $('.btn-prev').addClass("hide");
            }
            $('.btn_' + page).removeClass("btn-default");
            $('.btn_' + page).addClass("btn-primary");
        }
        $('.label').html("");
        question_id = $('.question_' + page).attr("id");
    });

    $('.btn_question').click(function () {
        $('.label').html("");
        if ($(this).hasClass("btn-default") || $(this).hasClass("btn-primary")) {
            $('.question_' + page).addClass("hidden");
            $('.btn_' + page).removeClass("btn-primary");
            $('.btn_' + page).addClass("btn-default");
            $('.btn-submit').addClass("hide");
            var idButton = $(this).attr("id");
            page = idButton;
            $('.question_' + page).removeClass("hidden");
            question_id = $('.question_' + page).attr("id");
            $('.btn-prev').removeClass("hide");
            if (page == 1) {
                $('.btn-prev').addClass("hide");
            } else if (page > max_page) {
                $('.btn_end').addClass("btn-danger");
            }
            $('.btn-next').removeClass("hide");
            $('.btn_' + page).removeClass("btn-default");
            $('.btn_' + page).addClass("btn-primary");
        }else if($(this).hasClass("btn-danger")) {
            $('.question_' + page).addClass("hidden");
            $('.btn_' + page).removeClass("btn-primary");
            $('.btn_' + page).addClass("btn-default");
            $('.btn-next').addClass("hide");
            $('.btn-submit').removeClass("hide");
            $('.btn-prev').removeClass("hide");
            $('.show-warning').removeClass("hidden");
            page = parseInt(max_page) + parseInt("1");
        }
    });

});