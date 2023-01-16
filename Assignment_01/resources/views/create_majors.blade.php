
 
@extends('layouts.app')
@section('content')
<div class="panel-body">

  <!-- Display Validation Errors -->
  @include('common.errors')


  <form action="{{ url('/create_majors') }}" method="GET" class="form-horizontal" style="width:400px; margin:0 auto;">
      @csrf

      <!-- Update Major -->
      <div class="form-group">
          <label for="task" class="col-sm-12 control-label" style="padding:5px 0px; font-size:19px; font-weight:bold;">Majors</label>

          <div class="col-sm-12">
              <input type="text" name="name"  id="task-name" class="form-control @error('name') is-invalid @enderror">
          </div>
      </div>

      <!-- Add Update Button -->
      <div class="form-group">
          <div class="col-sm-offset-3 col-sm-6">
          <a href="{{ url('/major')}}" class="back btn btn-dark">Back</a>
              <button type="submit" class="btn btn-dark">
                  <i class="fa fa-plus"></i> Add Major
              </button>
          </div>
      </div>
  </form>
</div>

@endsection