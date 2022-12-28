
 
@extends('layouts.app') 
@section('content')
<div class="panel-body">

  <!-- Display Validation Errors -->
  @include('common.errors')
 
  <!-- New Student Form -->
  <form action="{{ url('/create_students') }}" method="GET" class="form-horizontal" style="width:400px; margin:0 auto;">
      @csrf

      <!-- Student Data -->
      <div class="form-group">
          <label for="task" class="col-sm-12 control-label" style="padding:5px 0px; font-size:19px; font-weight:bold;">Student</label>
 
          <div class="col-sm-12">
              <input type="text" name="name" placeholder="Student name" id="task-name" class="form-control @error('name') is-invalid @enderror">
          </div>
          <div class="col-sm-12">
              <input type="email" name="email" placeholder="Email address" id="task-name" class="form-control @error('email') is-invalid @enderror">
          </div>
          <div class="col-sm-12">
              <input type="number" name="phone" placeholder="Phone number" id="task-name" class="form-control @error('phone') is-invalid @enderror">
          </div>
          <div class="col-sm-12">
              <input type="text" name="address" placeholder="Address" id="task-name" class="form-control @error('address') is-invalid @enderror">
          </div>

                

                
 @if (count($students) > 0)
                
                
<!-- Update Student -->

<div class="majorselect">



<select name="majors" style="width:209px; height:30px; outline:none;">
   

    @foreach ($students as $majors)
    <option value="{{ $majors->id }}">{{$majors->name}}</option>   
    @endforeach
</select>

</div>


@endif 

      
      </div>

      <!-- Add Update Button -->
      <div class="form-group" style="display:flex; margin-top:10px;">
      <div class="col-sm-offset-3 col-sm-3">
      <a href="{{ url('/student')}}" class="back btn btn-primary">Back</a>
          </div>
          <div class="col-sm-offset-3 col-sm-6">
              <button type="submit" class="btn btn-primary">
                  <i class="fa fa-plus"></i> Add Student
              </button>
          </div>
      </div>
  </form>
</div>

@endsection