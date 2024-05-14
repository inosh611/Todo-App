@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="page-title">My Sub Task List</h1>
                <h5 class="page-task-main">{{ $task->title }}</h5>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3>
                            Create New Task
                        </h3>
                    </div>
                    <div class="card card-body">
                        <form action="{{ route('todo.sub.store') }}" method="post" enctype="multipart/form">
                            @csrf
                            <div class="row pt-4">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input class="form-control" type="text" placeholder="Enter Sub title"
                                                    aria-label="default input example" name="sub_title">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input class="form-control" type="number" placeholder="Enter Phone Number"
                                                    aria-label="default input example" name="phone">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row pt-4">
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <select name="priority" id="piority" class="form-control">
                                                            <option value="1">Priority 1</option>
                                                            <option value="2">Priority 2</option>
                                                            <option value="3">Priority 3</option>
                                                            <option value="4">Priority 4</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <textarea name="note" id="note" cols="30" rows="2" placeholder="Enter Note" required="required"
                                                            class="form-control"></textarea>
                                                    </div>

                                                </div>
                                                <div class="col-lg-4">
                                                    <input type="date" name="date" id="date"
                                                        placeholder="Enter Date" required="required" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center col-lg-12 mt-3">
                                <input type="hidden" name="task_id" value="{{ $task->id }}">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                    </div>

                    </form>
                </div>

            </div>

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
                    @foreach ($sub_task as $sub_task)
                        <tr>
                            <td>{{ $sub_task->sub_title }}</td>
                            <td>{{ $sub_task->phone }}</td>
                            <td>{{ $sub_task->priority }}</td>
                            <td>{{ $sub_task->date }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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

        .page-task-main {
            font-size-adjust: 4rem;
            color: rgb(120, 199, 31);
        }
    </style>
@endpush

@push('js')
    <script></script>
@endpush
