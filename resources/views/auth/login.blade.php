<!DOCTYPE html>
<html lang="en">

@include('layouts.head')

<body class="bg-image"
    style="
        background: rgb(188,188,188);
        background: linear-gradient(0deg, rgba(188,188,188,0.5) 0%, rgba(79,131,182,0.5) 100%);">

    <div id="main" class="container">
        <div class="d-flex align-items-center justify-content-center vh-100">
            <form method="POST" action="{{ route('login') }}" class="p-5 border border-3 rounded-3"
                style="background:#edf2f7">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control @error('email') border border-danger  @enderror"
                        id="exampleInputEmail1" name="email" value="{{ old('email') }}">
                    @error('email')
                        <p class="text-danger text-sm">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control @error('password') border border-danger @enderror"
                        id="exampleInputPassword1" name="password" value="{{ old('password') }}">
                    @error('password')
                        <p class="text-danger text-sm">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div>
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label text-sm text-secondary" for="exampleCheck1">Remember me</label>
                </div>

                <div class="text-center pt-3">
                    <button type="submit" class="btn btn-primary text-center">LOGIN</button>
                </div>
                @if (Route::has('password.request'))
                    <div class="text-center pt-2">
                        <a class="underline text-sm link-secondary"
                            href="{{ route('password.request') }}">
                            {{ __('Forgot password?') }}
                        </a>
                    </div>
                @endif

            </form>
        </div>

    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
