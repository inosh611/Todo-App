@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="page-title">My Todo List</h1>
            </div>
            <div class="col-lg-12">
                <form action="{{ route('todo.store') }}" method="post" enctype="multipart/form">
                    @csrf
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Enter task"
                                    aria-label="default input example" name="title">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-12 mt-4">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Count</th>
                            <th scope="col">Title</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $key => $task)
                            <tr>
                                <th scope="row">{{ $key++ }}</th>
                                <td>{{ $task->title }}</td>
                                <td>
                                    @if ($task->done == 0)
                                        <span class="badge text-bg-warning">Not Completed</span>
                                    @else
                                        <span class="badge text-bg-success">Completed</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('todo.done', $task->id) }}" style="margin-right:10px"
                                        class="btn btn-success"><i class="fa-solid fa-check"
                                            style="color: #ffffff;"></i></a>
                                    <a href="{{ route('todo.delete', $task->id) }}" style="margin-right:10px"
                                        class="btn btn-danger"><i class="fa-solid fa-trash-can"
                                            style="color: #ffffff;"></i></a>
                                    <a href="javascript:void(0)" class="btn btn-primary"><i class="fa-solid fa-pen"
                                            style="color: #ffffff;" onclick="taskEditModel({{ $task->id }})"></i></a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div class="modal fade" id="taskEdit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="taskEditLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="taskEditLabel">Main Task Edit</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body" id="taskEditContent">
                    <h1>model</h1>
                </div>

            </div>
        </div>
    </div>
@endsection

@push('css')
    <style>
        .page-title {
            padding-top: 5vh;
            font-size: 5rem;
            color: #1d864d;
        }
    </style>
@endpush

@push('js')
    <script>
        function taskEditModel(task_id) {
            var data = {
                task_id: task_id,
            };
            $.ajax({
                    url: "{{ route('todo.edit') }}",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'GET',
                    dataType: '',
                    data: data,
                    success: function (response){
                        $('#taskEdit').modal('show');
                        $('#taskEditContent').html(response);
                    }
                });


        }
    </script>
@endpush
