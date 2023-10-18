<!DOCTYPE html>
<html lang="en">

@include('layouts.head')

<body class="bg-image"
    style="
        background: rgb(188,188,188);
        background: linear-gradient(0deg, rgba(188,188,188,0.5) 0%, rgba(79,131,182,0.5) 100%);">

    <div id="main" class="container">
        <div class="d-flex align-items-center justify-content-center vh-100">
            <form method="POST" action="{{ route('password.email') }}" class="p-5 border border-3 rounded-3"
                style="background:#edf2f7">
                @csrf
                <div class="mb-3">
                    <p class="text-sm text-secondary">
                        Forgot your password? No problem. Just let us know your email <br>address and we will email you a password reset link that will <br>allow you to choose a new one.
                    </p>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    {{-- <input type="text" name="email" class="form-control" id="exampleInputEmail1"> --}}
                    <input type="email" class="form-control @error('email') border border-danger  @enderror"
                        id="exampleInputEmail1" name="email" value="{{ old('email') }}">
                    @error('email')
                        <p class="text-danger text-sm">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="position-relative pt-3">
                    <button type="submit" class="position-absolute top-0 end-0 btn btn-primary">EMAIL PASSWORD RESET LINK</button>
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
