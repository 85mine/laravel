@extends('backend.layout.main')
@section('title')
    Question
@endsection

@section('extend-css')
    <link href="{{ URL::asset('assets/css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
@endsection

@section('breadcrumb')
    <h2>Question Management</h2>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.dashboard') }}">Home</a>
        </li>
        <li class="active">
            <strong>Question</strong>
        </li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div class="over-hidden bulk-action">
                        <a href="{{route('question.add')}}"
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
                                <th>Content</th>
                                <th>Answer</th>
                                <th>Status</th>
                                <th class="nosort"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $key=>$question)
                            <?php
                                $list_answer = json_decode($question->answer);
                                $azRange = range('A', 'Z');
                            ?>
                            <tr class="gradeX">

                                <td class="center">
                                    <div class="checkbox checkbox-success">
                                        <input id="checkbox{{$question->id}}" class="check" type="checkbox">
                                        <label for="checkbox{{$question->id}}"></label>
                                    </div>
                                </td>
                                <td>{{$question->content}}</td>
                                <td>

                                    @foreach($list_answer as $key => $answer)
                                    <p>{{$azRange[$key] .' : '.$answer}}</p>
                                    @endforeach
                                </td>
                                <td>{{$question->status}}</td>
                                <td class="center">
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-warning edit" title="Edit"><i class="fa fa-edit"></i></a>
                                        <a href="javascript:;" class="btn btn-danger delete" title="Xóa" data-delete=""><i class="fa fa-remove"></i></a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
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