<!-- resources/views/tasks.blade.php -->
 
@extends('layouts.app')
 
@section('content')
<?php use App\Models\joinstudentmajor; ?>
<div class="panel-body">
<form action="{{ url('student/' . $student->id  . '/updatequery') }}" method="POST" class="taskupdate" style="width:400px; margin:0 auto;">
            @csrf
            @method('POST')
                    <!-- Display Validation Errors -->
        @include('common.errors')
            <!-- Task Name -->
            <div class="form-group">
                <label for="task" class="col-sm-12 control-label" style="padding:5px 0px; font-size:19px; font-weight:bold;">Student</label>
 
                <div class="col-sm-12">
                    
                    <input type="text" name="name" value="{{ $student->name ?? old('name')}}" id="task-name" class="form-control @error('name') is-invalid @enderror">
                   
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    
                    <input type="text" name="email" value="{{ $student->email ?? old('name')}}" id="task-name" class="form-control @error('name') is-invalid @enderror">
                   
                </div>
            </div>
            <div class="form-group">

 
                <div class="col-sm-12">
                    
                    <input type="text" name="phone" value="{{ $student->phone ?? old('name')}}" id="task-name" class="form-control @error('name') is-invalid @enderror">
                   
                </div>
            </div>
            <div class="form-group">

 
                <div class="col-sm-12">
                    
                    <input type="text" name="address" value="{{ $student->address ?? old('name')}}" id="task-name" class="form-control @error('name') is-invalid @enderror">
                   
                </div>
            </div>
  
            <div class="majorselect">



                <select name="majors" style="width:209px; height:30px; outline:none;">
                   
                
                    @foreach ($majors as $major)
                    <option value="{{ $major->id }}">{{$major->name}}</option>   
                    @endforeach
                </select>
                
                </div>        
 
            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-8" style="margin-top:10px; display:flex; justify-content:space-between;">

                    <a href="{{ url('/')}}" class="back btn btn-primary">Back</a>
                    <button type="submit" class="btn btn-primary" style="">
                        <i class="fa fa-file-pen"></i> Update Student
                    </button>
                </div>
            </div>
</form>
</div>

@endsection