// $(document).ready(function () {
//     $('.sml-select-all').change(function() {
//         if(this.checked) {
//             $('.sml-select-all').prop('checked', true);
//             $('.sml-select-item').prop('checked', true);
//         }else{
//             $('.sml-select-all').prop('checked', false);
//             $('.sml-select-item').prop('checked', false);
//         }
//     });
//
//     $('.sml-select-all, .sml-select-item').change(function() {
//         if(this.checked) {
//             $('.sml-delete-btn').removeClass( "btn-disable" ).addClass( "btn-danger" );
//         }else {
//             $('.sml-delete-btn').removeClass( "btn-danger" ).addClass( "btn-disable" );
//         }
//     });
//
//     $('.sml-delete-btn').on('click',function () {
//         var selected = [];
//         var list = $('input[type=checkbox].sml-select-item');
//         $.each(list,function(){
//             if(this.checked){
//                 selected.push($(this).val());
//             }
//         });
//
//         var form = $('#sml-form-delete-submit');
//         var value_to_delete = form.find('input[type="hidden"][name="value_to_delete"]');
//         value_to_delete.val(selected);
//     });
// });