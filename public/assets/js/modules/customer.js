$(document).ready(function () {

    $('.select_all').change(function() {
        if(this.checked) {
            $('.select_all').prop('checked', true);
            $('.select_item').prop('checked', true);
        }else{
            $('.select_all').prop('checked', false);
            $('.select_item').prop('checked', false);
        }
    });
});