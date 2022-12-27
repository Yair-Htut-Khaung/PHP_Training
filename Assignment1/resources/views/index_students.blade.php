
 
    @extends('layouts.app')


@section('content')
    <!-- Current Students -->


        <?php use App\Models\joinstudentmajor; ?>

        <div class="panel panel-default">
           

            <div class="panel-body">

                <div class="clear-fix">
                    <h2 class="control-label f-left">Student List</h2>
                    <div class="f-right">
                        <a href="{{ url('/student_add') }}" class="btn btn-dark f-right" style="margin:30px 0">
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



        
        <div class="">{{ $student->major }}</div>
   

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



</div>


@endif 


@endsection