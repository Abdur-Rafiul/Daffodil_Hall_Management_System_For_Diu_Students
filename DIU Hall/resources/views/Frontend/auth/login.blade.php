@extends('Frontend.Layout.appSupported')
@section('title','Login')
@section('content')
    <div style="height: 100%!important;">
    @include('Frontend.auth.dashboard')
<main class="login-form" style="height: fit-content!important;">
    <div class="container-fluid mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-4 col-sm-12">
                <div class="card p-lg-5">
                    <h3 class="card-header text-center">Login</h3>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login.custom') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text" placeholder="StudentID" id="StudentID" class="form-control" name="StudentID" required
                                    autofocus>
                                @if ($errors->has('StudentID'))
                                <span class="text-danger">{{ $errors->first('StudentID') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <input type="password" placeholder="Password" id="password" class="form-control" name="password" required>
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                            <div class="d-grid mx-auto">
                                <a class="nav-link text-primary" href="{{ route('reset') }}">Forgot Password</a>

                                <button type="submit" class="btn btn-primary btn-block mt-2 mb-4">Signin</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
    <div class="mt-5 fixed-bottom">

        @include('Frontend.Footer')
    </div>
    </div>
@endsection
