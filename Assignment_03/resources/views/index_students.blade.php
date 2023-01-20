
 
    @extends('layouts.app')


@section('content')
    <!-- Current Students -->


        <?php use App\Models\Major; ?>

        <div class="panel panel-default">
            <div class="row">
                <div class="clear-fix" style="width:1200px; margin-top:20px;">
                 <a href="export-csv" target="_blank" class="btn btn-primary me-1 f-left">Export Data</a>
                    <button type="button" class="btn btn-success f-left" data-bs-toggle="modal" data-bs-target="#exampleModal">
                     Import Data
                     </button>
                     <form action="{{ url('studentsearch/') }}" type="get">
                     
                     <button class="btn btn-primary f-right" type="submit"> <i class="fa fa-search"></i>  Search</button>
                     <input type="search" name="search" class="f-right  @error('search') is-invalid @enderror" style="margin-right: -1px; outline:none;" required>
                    </form>
                </div>
                @if (session('success'))
                     <div class="alert alert-success alert-dismissible fade show" role="alert">
                     {{ session('success') }}
                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                     </div>
                @endif  

            <div class="panel-body">

                <div class="clear-fix">
                    <h2 class="control-label f-left">Student List</h2>
                    <div class="f-right">
                        <a href="{{ url('/student_add') }}" class="btn btn-primary f-right" style="margin:30px 0">
                            <i class="fa fa-plus"></i> Add Student</a>
                    </div>
                </div>

                <table class="table table-striped task-table" style="margin:0 auto;">
            
                    <!-- Table Body -->
                    <tr class="table-header">
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Major</th>
                            <th></th>
                        </tr>
                    <tbody class="schedule-row-loop-div">


                    @if (count($students) > 0)
                        @foreach ($students as $student)
                          

                        
                        <tr class="schedule-row-loop">
    <!-- Student Name -->
    <td class="table-text">
        <div>{{ $student->name }}</div>
    </td>

    <!-- Student Email -->
    <td class="common-td">
        <div>{{ $student->email }}</div>
    </td>
    <!-- Student Phone -->
    <td class="common-td">
        <div>{{ $student->phone }}</div>
    </td>
    <!-- Student Address -->
    <td class="common-td">
        <div>{{ $student->address }}</div>
    </td>
   
      <!-- Student Address -->
      <td class="major-maxwidth clear-fix">  

      

        <?php
         $majorobj = Major::select('majors.name')
        ->where('majors.id','=', $student->major )
        ->get();
    //    
        foreach ($majorobj as $major) { ?>
        
        <div class="">{{ $major->name }}</div>
   <?php   }
        ?>

</td>


        <td class="action clear-fix">
                 <!-- Edit Button -->
            <form action="{{ url('studentupdate/' . $student->id ) }}" method="GET" class="f-right">
           @csrf

            <button type="submit" class="btn btn-primary">
                <i class="fa fa-edit"></i> Edit
            </button>
            <input type="hidden" name="_method" value="Edit"> 
        </form>
        <!-- Delete Button -->
        <form action="{{ url('studentdel/'.$student->id) }}" method="GET" class="f-right">
            @csrf
            
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to do that?');">
                <i class="fa fa-trash"></i> Delete
            </button>

      
        </form>
        

    </td>
</tr>
@endforeach               
</tbody>
</table>
</td>
</div>
@endif 

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Import CSV</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="import" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="file" name="file" class="form-control">
                            <button class="btn btn-primary" type="submit" style="height:38px;">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
@endsection