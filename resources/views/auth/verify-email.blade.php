<html lang="en">

@include('layouts.head')

<body class="bg-image"
    style="
        background: rgb(188,188,188);
        background: linear-gradient(0deg, rgba(188,188,188,0.5) 0%, rgba(79,131,182,0.5) 100%);">

    <div id="main" class="container">
        <div class="d-flex align-items-center justify-content-center vh-100">
            <form method="POST" action="{{ route('verification.send') }}" class="p-5 border border-3 rounded-3"
                style="background:#edf2f7">
                @csrf
                <div class="position-relative pt-3">
                    <button type="submit" class="position-absolute top-0 end-0 btn btn-primary">ReESEND VERIFICATION EMAL</button>
                </div>
            </form>
            <form method="POST" action="{{ route('logout') }}" class="p-5 border border-3 rounded-3"
                style="background:#edf2f7">
                @csrf
                <div class="position-relative pt-3">
                    <button type="submit" class="position-absolute top-0 end-0 btn btn-primary">LOGOUT</button>
                </div>
            </form>
        </div>

    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>

