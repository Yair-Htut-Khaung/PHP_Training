<!-- resources/views/common/errors.blade.php -->
 
@if (count($errors) > 0)
    <!-- Form Error List -->
    <div class="alert alert-danger" style="position:fixed; top:5px; left:0; right:0; width:400px; margin:0 auto;">
        <strong>Whoops! Something went wrong!</strong>
 
        <br><br>
 
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif