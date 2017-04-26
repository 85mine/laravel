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
    $('#project_edit').find('.form-control').prop('disabled',true);
    $('#project_edit .choose_base').prop('disabled',true);
    $('#project_edit .btn_edit').click(function(){
        $(this).hide();
        $('.btn_update').show();
        $('#project_edit').find('.form-control').prop('disabled',false);
        $('#project_edit .choose_base').prop('disabled',false);
    });
    $('#project_edit .btn_update').click(function(){
        $(this).hide();
        $('.btn_edit').show();
        $('#project_edit').find('.form-control').prop('disabled',true);
        $('#project_edit .choose_base').prop('disabled',true);
    });
});
