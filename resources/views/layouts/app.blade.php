<!DOCTYPE html>
<html lang="en">

@include('layouts.head')

<body>
    <div id="main" class="container">
        @include('layouts.header')
        <div style="padding:5em 3em">
            @yield('content')
        </div>
        
    </div>

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>l
