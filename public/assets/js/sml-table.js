$(document).ready(function () {
    $('.sml-select-all').prop('checked', false);
    $('.sml-select-item').prop('checked', false);

    var form = $('#sml-form-delete-submit');
    var data_to_delete = form.find('input[type="hidden"][name="s_ids"]');

    $('.sml-select-all').change(function() {
        if(this.checked) {
            $('.sml-select-all').prop('checked', true);
            $('.sml-select-item').prop('checked', true);
        }else{
            $('.sml-select-all').prop('checked', false);
            $('.sml-select-item').prop('checked', false);
        }
    });

    $('.sml-select-all, .sml-select-item').change(function() {
        if(get_list_checked().length>0){
            $('.sml-delete-btn').removeClass( "btn-disable" ).addClass( "btn-danger" );
        }else {
            $('.sml-delete-btn').removeClass( "btn-danger" ).addClass( "btn-disable" );
        }
    });

    $('.sml-delete-btn').on('click',function () {
        var selected = get_list_checked();
        if(selected.length === 0){
            return false;
        }
        data_to_delete.val(selected);
        show_confirm_box(form);
    });

    $('.sml-select-item-delete').on('click',function () {
        var selected = $(this).attr('name').slice(4);
        if(selected) {
            $('.sml-delete-btn').removeClass( "btn-disable" ).addClass( "btn-danger" );
            $('.sml-select-all').prop('checked', false);
            $('.sml-select-item').prop('checked', false);
            $(this).parent().parent().find('.sml-select-item').prop('checked', true);;

            data_to_delete.val(selected);
            show_confirm_box(form);
        }
    });

    function get_list_checked() {
        var selected = [];
        var list = $('input[type=checkbox].sml-select-item');
        $.each(list,function(){
            if(this.checked){
                selected.push($(this).val());
            }
        });
        return selected;
    }

    function show_confirm_box(form) {
        $.confirm({
            icon: 'fa fa-warning',
            title: window.trans.confirm.title,
            content: '<strong>' + window.trans.confirm.question + '</strong>',
            animation: 'opacity',
            closeAnimation: 'scale',
            buttons: {
                yes: {
                    text: window.trans.confirm.yes,
                    keys: ['y'],
                    action: function () {
                        form.submit();
                    }
                },
                no: {
                    text: window.trans.confirm.no,
                    keys: ['N'],
                },
            }
        });
    }

});
