<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('style.css') }}">

    <title>Import & Export CSV in Laravel 8</title>
  </head>
  <body>
    
   <div class="container my-5">
       <h1 class="fs-5 fw-bold text-center">Import & Export CSV in Laravel 8</h1>
       <div class="row">
           <div class="d-flex my-2">
            <a href="export-csv" target="_blank" class="btn btn-primary me-1">Export Data</a>
               <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Import Data
                </button>
           </div>
           @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
           @endif
            <table class="table">
                <thead>
                    <tr class="csvtable">
                    <th scope="col">id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Address</th>
                    <th scope="col">Major</th>
                    <th scope="col">Action</th>

                    </tr>
                </thead>
                <tbody>
                @foreach ($students as  $item)
                    <tr class="csvtable">
                        
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>{{ $item->address }}</td>
                        <td>{{ $item->major }}</td>
                        <td class="action clear-fix">
                            
                            <!-- Edit Button -->
                       <form action="{{ url('studentupdate/' . $item->id ) }}" method="GET" class="f-left">
                      @csrf
           
                       <button type="submit" class="btn btn-primary">
                           <i class="fa fa-edit"></i> Edit
                       </button>
                       <input type="hidden" name="_method" value="Edit"> 
                   </form>
                   <!-- Delete Button -->
                   <form action="{{ url('studentdel/'.$item->id) }}" method="GET" class="f-left">
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
   </div>

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>