
 
@extends('layouts.app')


@section('content')
    <!-- Current Majors -->



        <div class="panel panel-default">
           
            <div class="panel-body">

                <div class="clear-fix">
                    <h2 class="control-label f-left">Major List</h2>
                    <div class="f-right">
                        <a href="{{ url('/linkmajorcreate') }}" class="btn btn-sm btn-primary f-right" style="margin:30px 0">
                            <i class="fa fa-plus"></i> Add Major</a>
                    </div>
                </div>
                
                <table class="table table-striped task-table" style="margin:0 auto;">
            
                    <!-- Table Body -->
                    <tbody class="schedule-row-loop-div">
                    @if (count($majorlist) > 0)
                        @foreach ($majorlist as $majors)
                        

                        
                        <tr class="schedule-row-loop">
    <!-- Major Name -->
    <td class="table-text">
        <div>{{ $majors->name }}</div>
    </td>
        
        <td class="action clear-fix">
                 <!-- Edit Button -->
            <form action="{{ url('major/' . $majors->id . '/edit') }}" method="GET" class="f-right">
           @csrf

            <button type="submit" class="btn btn-primary">
                <i class="fa fa-edit"></i> Edit
            </button>
            <input type="hidden" name="_method" value="Edit"> 
        </form>
        <!-- Delete Button -->
        <form action="{{ url('major/'.$majors->id) }}" method="GET" class="f-right">
            @csrf
            {{ method_field('DELETE') }}

            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to do that?');">
                <i class="fa fa-trash"></i> Delete
            </button>
            <input type="hidden" name="_method" value="DELETE"> 
        </form>

    </td>
</tr>
                            
    @endforeach
                    
</tbody>

</table>

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
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
        
@endsection