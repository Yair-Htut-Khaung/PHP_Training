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
            <div class="form-group">

            <table class="table table-striped task-table" style="margin:0 auto;">
            
            <!-- Table Body -->
            <tbody>
                
       
            <?php $count = 1; 
                //   $majorCheck = joinstudentmajor::
                //   select('students.name', 'majors.name')
                //   ->from('majors')
                //   ->join('joinstudentmajors','majors.id','=','joinstudentmajors.major_id')
                //   ->join('students','joinstudentmajors.student_id','=','students.id')
                //   ->where('joinstudentmajors.student_id','=',$student->id)
                //   ->orderBy('majors.name','asc')
                //   ->get(); ?>
                @foreach ($majors as $major)
                

                
                
<!-- Task Name -->

<div class="majorselect">
<td class="majorselect">
    <?php   

        
             
            if($major->name == $student->major){
    ?>
               
                 
    
       <input type="radio" name="majors[]" id="{{ $major->id }}" value="{{ $major->name }}" checked>
     <?php } else { ?>
      <input type="radio" name="majors[]" id="{{ $major->id }}" value="{{ $major->name }}">
     <?php } ?> 
     
          
    
</td>
<td>
<label for="{{ $major->id }}" style="width:max-content;">{{ $major->name }}</label>
</td>
</div>
<?php 


if($count == 3){
   echo "</tr><tr>"; 
   $count = 0;
}




$count++;
?>







                            
    @endforeach

</tr>                    
</tbody>
</table>

            </div>            
 
            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-8" style="margin-top:10px; display:flex; justify-content:space-between;">

                    <a href="{{ url('/')}}" class="back btn btn-dark">Back</a>
                    <button type="submit" class="btn btn-primary" style="">
                        <i class="fa fa-file-pen"></i> Update Student
                    </button>
                </div>
            </div>
</form>
</div>

@endsection