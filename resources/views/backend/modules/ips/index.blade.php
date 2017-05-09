@extends('backend.layout.main')
@section('title', trans('labels.title.ips'))
@section('extend-css')
    <link href="{{url('assets/css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">
    <link href="{{url('assets/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css')}}"
          rel="stylesheet">
@endsection
@section('breadcrumb')
    <h2>{{ trans('labels.label.ips.page_title') }}</h2>
    <ol class="breadcrumb">
        {{--<li class="active">--}}
        {{--<a href="{{ route('admin.dashboard') }}">Home</a>--}}
        {{--</li>--}}
        {{--<li class="active">--}}
        {{--<strong>Home</strong>--}}
        {{--</li>--}}
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    {{--Add/Delete Button--}}
                    <div class="over-hidden bulk-action">
                        <a href="#"
                           class="btn btn-success pull-right"><i
                                    class="fa fa-fw fa-plus"></i> Add</a>
                        <a href="javascript:;"
                           class="btn btn-danger btn-delete-submit pull-right m-r-10 hidden" data-action="deleted"><i
                                    class="fa fa-fw fa-remove"></i> Bulk Delete</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                            <tr>
                                <th class="nosort text-center">
                                    <div class="checkbox checkbox-success">
                                        <input id="checkAll" type="checkbox" class="check-all" data-target="tbody">
                                        <label for="checkAll"></label>
                                    </div>
                                </th>
                                <th>Rendering engine</th>
                                <th>Browser</th>
                                <th>Platform(s)</th>
                                <th>Engine version</th>
                                <th>CSS grade</th>
                                <th class="nosort"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="gradeX">
                                <td class="center">
                                    <div class="checkbox checkbox-success">
                                        <input id="checkbox1" class="check" type="checkbox">
                                        <label for="checkbox1"></label>
                                    </div>
                                </td>
                                <td>Trident</td>
                                <td>Internet
                                    Explorer 4.0
                                </td>
                                <td>Win 95+</td>
                                <td class="center">4</td>
                                <td class="center">X</td>
                                <td class="center">
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-warning edit" title="Edit"><i class="fa fa-edit"></i></a>
                                        <a href="javascript:;" class="btn btn-danger delete" title="Xóa" data-delete=""><i class="fa fa-remove"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr class="gradeC">
                                <td class="center">
                                    <div class="checkbox checkbox-success">
                                        <input id="checkbox2" class="check" type="checkbox">
                                        <label for="checkbox2"></label>
                                    </div>
                                </td>
                                <td>Trident</td>
                                <td>Internet
                                    Explorer 5.0
                                </td>
                                <td>Win 95+</td>
                                <td class="center">5</td>
                                <td class="center">C</td>
                                <td class="center">
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-warning edit" title="Edit"><i class="fa fa-edit"></i></a>
                                        <a href="javascript:;" class="btn btn-danger delete" title="Xóa" data-delete=""><i class="fa fa-remove"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr class="gradeA">
                                <td class="center">
                                    <div class="checkbox checkbox-success">
                                        <input id="checkbox3" class="check" type="checkbox">
                                        <label for="checkbox3"></label>
                                    </div>
                                </td>
                                <td>Trident</td>
                                <td>Internet
                                    Explorer 5.5
                                </td>
                                <td>Win 95+</td>
                                <td class="center">5.5</td>
                                <td class="center">A</td>
                                <td class="center">
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-warning edit" title="Edit"><i class="fa fa-edit"></i></a>
                                        <a href="javascript:;" class="btn btn-danger delete" title="Xóa" data-delete=""><i class="fa fa-remove"></i></a>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('extend-js')
    <script src="{{url('assets/js/plugins/dataTables/datatables.min.js')}}"></script>
    <script src="{{url('assets/js/common.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('.dataTables-example').DataTable({
                pageLength: 25,
                responsive: true,
                'aoColumnDefs': [
                    {
                        'aTargets': ['nosort'],
                        'bSortable': false

                    }
                ],
                'order': [[1, 'desc']]
            });

            // delete button
            $(document).on('click', 'input[type="checkbox"]', function () {
                var checkbox_length = $('input.check:checked').length;
                if (checkbox_length > 0) {
                    $('.bulk-action .btn-delete-submit').removeClass('hidden');
                } else {
                    $('.bulk-action .btn-delete-submit').addClass('hidden');
                }
            });
        });

    </script>
@endsection