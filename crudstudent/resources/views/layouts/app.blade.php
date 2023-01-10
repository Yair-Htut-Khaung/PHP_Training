<!-- resources/views/layouts/app.blade.php -->
 
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>CRUD Student</title>
        <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('style.css') }}">



 
        <!-- CSS And JavaScript -->
    </head>
 
    <body>
        <div class="container">
            <nav class="navbar navbar-default">
                <!-- Navbar Contents -->
            </nav>
        </div>
        
        <div class="header-banner clear-fix">
        <h1 class="text-primary f-left">Admin</h1>
            <a href="{{ url('/major')}}" class="tab f-right btn btn-outline-dark">Major List</a>
            <a href="{{ url('/student')}}" class="tab f-right btn btn-outline-dark">Student List</a>
        </div>
 
        @yield('content')
        <!-- JavaScript Bundle with Popper -->
<script type="text/javascript" src="{{ URL::asset('js/jquery-3.6.1.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/4272ed572c.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{ URL::asset('js/comn.js') }}"></script>

</body>
</html>