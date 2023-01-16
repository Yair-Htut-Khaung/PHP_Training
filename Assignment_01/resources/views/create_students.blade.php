
 
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


          <table class="table table-striped task-table" style="margin:0 auto;">
            
            <!-- Table Body -->
            <tbody>
                
            @if (count($students) > 0)
            <?php $count = 1; ?>
                @foreach ($students as $majors)
                

                
                
<!-- Update Student -->

<div class="majorselect">
<td class="majorselect">
    <input type="radio" name="majors[]" id="{{ $majors->id }}" value="{{ $majors->name }}"  required>
</td>
<td>
<label for="{{ $majors->id }}" style="width:max-content;">{{ $majors->name }}</label>
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


@endif 











          
      </div>

      <!-- Add Update Button -->
      <div class="form-group" style="display:flex; margin-top:10px;">
      <div class="col-sm-offset-3 col-sm-3">
      <a href="{{ url('/student')}}" class="back btn btn-dark">Back</a>
          </div>
          <div class="col-sm-offset-3 col-sm-6">
              <button type="submit" class="btn btn-dark">
                  <i class="fa fa-plus"></i> Add Student
              </button>
          </div>
      </div>
  </form>
</div>

@endsection