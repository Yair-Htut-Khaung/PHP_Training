<!-- resources/views/tasks.blade.php -->

@extends('layouts.app')

@section('content')

    <form action="{{ url('task/' . $post->id . '/updatequery') }}" method="POST" class="taskupdate"
        style="width:400px; margin:0 auto;">
        @csrf
        @method('POST')
        <!-- Display Validation Errors -->
        @include('common.errors')
        <!-- Task Name -->
        <div class="form-group">
            <label for="task" class="col-sm-12 control-label"
                style="padding:5px 0px; font-size:19px; font-weight:bold;">Task</label>

            <div class="col-sm-12">

                <input type="text" name="name" value="{{ $post->name ?? old('name') }}" id="task-name"
                    class="form-control @error('name') is-invalid @enderror">

            </div>
        </div>

        <!-- Add Task Button -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-7" style="margin-top:10px; display:flex; justify-content:space-between;">

                <a href="{{ url('/') }}" class="btn btn-dark">Back</a>
                <button type="submit" class="btn btn-primary" style="">
                    <i class="fa fa-file-pen"></i> Update Task
                </button>
            </div>
        </div>
    </form>
