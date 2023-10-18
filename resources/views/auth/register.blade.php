<!DOCTYPE html>
<html lang="en">

@include('layouts.head')

<body class="bg-image"
    style="
        background: rgb(188,188,188);
        background: linear-gradient(0deg, rgba(188,188,188,0.5) 0%, rgba(79,131,182,0.5) 100%);">

    <div id="main" class="container">

        <div class="d-flex align-items-center justify-content-center vh-100" >
            <form method="POST" action="{{ route('web.register') }}" class="p-5 border rounded-3" style="background:#edf2f7">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    {{-- <input type="text" name="name" class="form-control" id="name"> --}}
                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                    id="name" name="name"  value="{{ old('name') }}">
                    @error('name')
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                @enderror
                </div>
                <div class="mb-3">
                    <label for="surname" class="form-label">Surname</label>
                    {{-- <input type="surname" name="surname" class="form-control" id="surname"> --}}
                    <input type="text" class="form-control @error('surname') is-invalid @enderror"
                    id="surname" name="surname"  value="{{ old('surname') }}">
                    @error('surname')
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    {{-- <input type="email" name="email" class="form-control" id="exampleInputEmail1"> --}}
                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                    id="exampleInputEmail1" name="email"  value="{{ old('email') }}">
                    @error('email')
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    {{-- <input type="password" name="password" class="form-control" id="exampleInputPassword1"> --}}
                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                    id="exampleInputPassword1" name="password"  value="{{ old('password') }}">
                    @error('password')
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                @enderror
                </div>
                <div class="text-center pt-3">
                    <button type="submit" class="btn btn-primary text-center">Register</button>
                </div>
            </form>
        </div>

    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>l
