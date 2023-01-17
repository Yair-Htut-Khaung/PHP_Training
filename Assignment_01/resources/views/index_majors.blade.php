
 
@extends('layouts.app')


@section('content')
    <!-- Current Majors -->



        <div class="panel panel-default">
           

            <div class="panel-body">

                <div class="clear-fix">
                    <h2 class="control-label f-left">Major List</h2>
                    <div class="f-right">
                        <a href="{{ url('/linkmajorcreate') }}" class="btn btn-dark f-right" style="margin:30px 0">
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

@endsection