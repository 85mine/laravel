@extends('backend.layout.main')
@section('title')
    {{trans('labels.title.survey.list')}}
@endsection

@section('extend-css')
    <!-- Magic-Check -->
    <link href="{{url('assets/css/plugins/magic-check/magic-check.min.css')}}" rel="stylesheet">
    <!-- dataTables -->
    <link href="{{url('assets/css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">
    <!-- jquery-confirm! -->
    {{--Demo: https://craftpip.github.io/jquery-confirm/--}}
    <link href="{{url('assets/css/plugins/jquery-confirm/jquery-confirm.min.css')}}" rel="stylesheet">
@endsection

@section('breadcrumb')
    <h2>{{trans('labels.title.survey.list')}}</h2>
    <ol class="breadcrumb">
        <li>
            <a href="{{route('admin.dashboard')}}">{{trans('labels.label.common.home')}}</a>
        </li>
        <li class="active">
            <strong>{{trans('labels.title.survey.list')}}</strong>
        </li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="row p-w-sm">
                    <div class="sml-box">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables">
                                <thead>
                                <tr>
                                    <th>{{trans('labels.label.survey.column.name')}}</th>
                                    <th>{{trans('labels.label.survey.column.email')}}</th>
                                    <th>{{trans('labels.label.survey.column.createDate')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                    {{--DataTables--}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="sml-box-footer">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('extend-js')
    <!-- dataTables -->
    <script src="{{url('assets/js/plugins/dataTables/datatables.min.js')}}"></script>
    <script src="{{url('assets/js/plugins/jquery-confirm/jquery-confirm.min.js')}}"></script>
    <script type="text/javascript">
        $('.dataTables').DataTable({
            pageLength: 10,
            destroy: true,
            responsive: true,
            processing: true,
            serverSide: true,
            autoWidth: false,
            order: [[1, 'desc']],
            ajax: {
                "url": '{!! route('survey.ajaxList') !!}',
                "type": "GET"
            },
            aoColumnDefs:[
                {
                    mData: "customer_name",
                    bSortable: true,
                    aTargets: [0]
                },
                {
                    mData: "customer_email",
                    bSortable: true,
                    aTargets: [1]
                },
                {
                    mData: "created_at",
                    bSortable: true,
                    aTargets: [2]
                },
            ],
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.sml-select-all').prop('checked', false);
            $('.sml-select-item').prop('checked', false);

            var form = $('#sml-form-delete-submit');
            var data_to_delete = form.find('input[type="hidden"][name="s_id"]');

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
                title: '{{ trans('messages.common.confirm_title') }}',
                content: '<strong>{{ trans('messages.common.confirm_delete_question') }}</strong>',
                animation: 'opacity',
                closeAnimation: 'scale',
                buttons: {
                    '{{ trans('messages.common.confirm_yes') }}': function () {
                        form.submit();
                    },
                    '{{ trans('messages.common.confirm_no') }}': function () {
                        // do something
                    }
                }
            });
        }
    </script>
@endsection