<!-- resources/views/tasks.blade.php -->

@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">

        <!-- Display Validation Errors -->
        @include('common.errors')

        <!-- New Task Form -->
        <form action="{{ url('task') }}" method="GET" class="form-horizontal" style="width:400px; margin:0 auto;">
            @csrf

            <!-- Task Name -->
            <div class="form-group">
                <label for="task" class="col-sm-12 control-label"
                    style="padding:5px 0px; font-size:19px; font-weight:bold;">Task</label>

                <div class="col-sm-12">
                    <input type="text" name="name" id="task-name"
                        class="form-control @error('name') is-invalid @enderror">
                </div>
            </div>

            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-dark">
                        <i class="fa fa-plus"></i> Add Task
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Current Tasks -->

    @if (count($tasks) > 0)
        <div class="panel panel-default">


            <div class="panel-body">
                <h2 class="control-label">Current Task</h2>
                <table class="table table-striped task-table" style="width:400px; margin:0 auto;">

                    <!-- Table Body -->
                    <tbody class="schedule-row-loop-div">

                        @foreach ($tasks as $task)
                            <tr class="schedule-row-loop">
                                <!-- Task Name -->
                                <td class="table-text col-sm-6">
                                    <div>{{ $task->name }}</div>
                                </td>

                                <!-- Delete Button -->
                                <td style="display:flex; justify-content:space-between;">
                                    <!-- Edit Button -->
                                    <form action="{{ url('task/' . $task->id . '/edit') }}" method="GET">
                                        @csrf

                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-edit"></i> Edit
                                        </button>
                                        <input type="hidden" name="_method" value="Edit">
                                    </form>
                                    <form action="{{ url('task/' . $task->id) }}" method="POST">
                                        @csrf
                                        {{ method_field('DELETE') }}

                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Are you sure you want to do that?');">
                                            <i class="fa fa-trash"></i> Delete
                                        </button>
                                        <input type="hidden" name="_method" value="DELETE">
                                    </form>

                                </td>
                            </tr>
            </div>
    @endforeach

    </tbody>
    </table>

    </div>
    @endif

@endsection
