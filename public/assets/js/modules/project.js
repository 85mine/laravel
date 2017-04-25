$(document).ready(function(){
    $('.input-group.date').datepicker({
        keyboardNavigation: false,
        forceParse: false,
        autoclose: true,
        todayHighlight: true
    });
    $('#result_option').change(function(){
        $('#content_result').val($(this).val());
        $('#myModal_result').modal('show');
    });
    $('.choose_base').click(function(){
        $('#content_base').val($(this).attr('data-base'));
        $('#reason_base').val('');
        $('#base_modal').modal('show');
    });
});
