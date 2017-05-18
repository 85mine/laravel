$(document).ready(function () {
    $('.i-checks').iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-green',
    });

    var page = $('.question').attr("class").split("question_")[1];
    var question_id = $('.question').attr("id");
    $('.question_' + page).removeClass("hidden");
    var max_page = $('.max_page').val();

    $('.btn-next').click(function () {
        console.log(question_id);
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
                page++;
                $('.btn-prev').removeClass('hide');
                if (page > max_page) {
                    $('.question_' + max_page).addClass("hidden");
                    $('.btn-next').addClass("hide");
                    $('.btn-submit').removeClass("hide");
                    $('.btn-prev').removeClass("hide");
                    $('.show-warning').removeClass("hidden");
                    page = parseInt(max_page) + parseInt("1");
                    // console.log(question_id);
                } else {
                    $('.question_' + page).removeClass("hidden");
                    $('.btn-next').removeClass("hide");
                    question_id = $('.question_' + page).attr("id");
                    // console.log(question_id);
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
        } else {
            $('.question_' + page).addClass("hidden");
            page--;
            $('.question_' + page).removeClass("hidden");
            if (page == 1) {
                $('.btn-prev').addClass("hide");
            }
        }
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