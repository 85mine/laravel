@extends('backend.layout.main')
@section('title', trans('labels.title.ips'))
@section('extend-css')
    <link href="{{url('assets/css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">
    <link href="{{url('assets/css/plugins/switchery/switchery.css')}}" rel="stylesheet">
    <link href="{{url('assets/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css')}}"
          rel="stylesheet">
    <link href="{{url('assets/css/plugins/jquery-confirm/jquery-confirm.min.css')}}"
          rel="stylesheet">
@endsection
@section('breadcrumb')
    <h2>{{ trans('labels.label.ips.page_title') }}</h2>
    <ol class="breadcrumb">
        <li class="active">
            <a href="{{ route('admin.dashboard') }}">{{ trans('labels.title.home.dashboard') }}</a>
        </li>
        <li class="active">
            <strong>{{ trans('labels.label.ips.page_title') }}</strong>
        </li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    {!! $messages !!}
                    {{--Add/Delete Button--}}
                    <div class="over-hidden bulk-action">
                        <a href="{{ route('ips.getAdd') }}"
                           class="btn btn-success"><i
                                    class="fa fa-fw fa-plus"></i> {{ trans('labels.label.common.btnAddMore') }}</a>
                        <a href="javascript:;"
                           class="btn btn-danger btn-delete-submit m-r-10 hidden" data-action="deleted"><i
                                    class="fa fa-fw fa-remove"></i> {{ trans('labels.label.common.bulkDelete') }}</a>
                        <input id="ips_enable" type="checkbox"
                               class="js-switch" {{ ($ips_enable == 1) ? 'checked' : '' }} />
                        <label id="ips_enable_label"
                               for="ips_enable">{{ ($ips_enable == 1) ? trans('labels.label.ips.ips_enable.on') : trans('labels.label.ips.ips_enable.off') }}</label>
                    </div>

                    <div class="table-responsive">
                        <table id="ip_table" class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th class="nosort text-center">
                                    <div class="checkbox checkbox-success">
                                        <input id="checkAll" type="checkbox" class="check-all" data-target="tbody">
                                        <label for="checkAll"></label>
                                    </div>
                                </th>
                                <th class="text-center">{{ trans('labels.label.ips.column.ip_address') }}</th>
                                <th class="text-center">{{ trans('labels.label.ips.column.description') }}</th>
                                <th class="nosort"></th>
                            </tr>
                            </thead>
                            <tbody>
                            {{--dataTables go here--}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! Form::open(array('route' => array('ips.postDelete'), 'method' => 'POST', 'id' => 'form_delete', 'class' => 'form-horizontal')) !!}
    {!! Form::hidden('id', null) !!}
    {!! Form::close() !!}
@endsection
@section('extend-js')
    <script src="{{url('assets/js/plugins/dataTables/datatables.min.js')}}"></script>
    <script src="{{url('assets/js/plugins/switchery/switchery.js')}}"></script>
    <script src="{{url('assets/js/common.js')}}"></script>
    <script src="{{url('assets/js/plugins/jquery-confirm/jquery-confirm.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('#ip_table').DataTable({
                pageLength: 25,
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: {
                    "url": '{!! route('ips.ajaxData') !!}',
                    "type": "GET"
                },
                aoColumns: [
                    {data: 'checkbox'},
                    {data: 'ip_address'},
                    {data: 'description'},
                    {data: 'buttons'}
                ],
                aoColumnDefs: [
                    {
                        'aTargets': ['nosort'],
                        'bSortable': false

                    },
                    {
                        'targets': [0, 1, 3],
                        "sClass": "text-center"
                    },
                    {"width": "30px", "targets": [0]},
                    {"width": "100px", "targets": [3]}
                ],
                order: [[1, 'desc']]
            });

            $(document).on('click', '.delete', function () {
                var $this = $(this),
                        selected_checkbox = $this.closest('tr').find('input.check'),
                        selected_checkbox_id = selected_checkbox.attr('id'),
                        $form = $('#form_delete'),
                        id_input = $form.find('input[name="id"]'),
                        data_id = $this.data('delete');
                id_input.val(data_id);

                // Check on selected checkbox
                if (selected_checkbox.is(':checked')) {
                    $('input[type="checkbox"]').not('#' + selected_checkbox_id).prop("checked", false);
                } else {
                    $('input[type="checkbox"]:checked').prop("checked", false);
                    selected_checkbox.trigger('click');
                }

                $.confirm({
                    icon: 'fa fa-warning',
                    title: '{{ trans('messages.common.confirm_title') }}',
                    content: '<strong>{{ trans('messages.common.confirm_delete_question') }}</strong>',
                    animation: 'opacity',
                    closeAnimation: 'scale',
                    buttons: {
                        '{{ trans('messages.common.confirm_yes') }}': function () {
                            $form.submit();
                        },
                        '{{ trans('messages.common.confirm_no') }}': function () {
                            // unCheck selected checkbox
                            selected_checkbox.trigger('click');
                        }
                    }
                });
            });

            $(document).on('click', '.btn-delete-submit', function () {
                var check_box = $('input[type="checkbox"]:checked'),
                        $form = $('#form_delete'),
                        id_input = $form.find('input[name="id"]'),
                        temp_arr = [];
                $.each(check_box, function () {
                    var $val = $(this).val();
                    temp_arr.push($val);
                });
                id_input.val(temp_arr);
                $.confirm({
                    icon: 'fa fa-warning',
                    title: '{{ trans('messages.common.confirm_title') }}',
                    content: '<strong>{{ trans('messages.common.confirm_delete_question') }}</strong>',
                    animation: 'opacity',
                    closeAnimation: 'scale',
                    buttons: {
                        '{{ trans('messages.common.confirm_yes') }}': function () {
                            $form.submit();
                        },
                        '{{ trans('messages.common.confirm_no') }}': function () {
                            // do something
                        }
                    }
                });
            });

            // switch button
            var elem = document.querySelector('.js-switch');
            var switchery = new Switchery(elem, {color: '#1AB394'});
            var switchery_label = $('#ips_enable_label');
            elem.onchange = function () {
                var elem_checked = elem.checked,
                        switchery_label_text = (elem_checked) ? '{{ trans('labels.label.ips.ips_enable.on') }}' : '{{ trans('labels.label.ips.ips_enable.off') }}';

                $.ajax({
                    type: 'post',
                    url: '{{ route('ips.postSetConnection') }}',
                    data: {
                        _token: "{{ csrf_token() }}",
                        ips_enable: elem_checked
                    },
                    dataType: 'json',
                    success: function (res) {
                        if (res.status = 'success') {
                            switchery_label.text(switchery_label_text);
                        }
                    }
                })
            };
        });
    </script>
@endsection