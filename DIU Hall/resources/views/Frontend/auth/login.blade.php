@extends('Frontend.Layout.appSupported')
@section('title','Login')
@section('content')
    <div style="height: 100%!important;">
    @include('Frontend.auth.dashboard')
<main class="login-form">
    <div class="container-fluid mt-5">
        <div class="row justify-content-center">

{{--            Option 1--}}
{{--            @if ($errors->any())--}}
{{--                <div class="alert alert-danger">--}}
{{--                    <ul>--}}
{{--                        @foreach ($errors->all() as $error)--}}
{{--                            <li>{{ $error }}</li>--}}
{{--                        @endforeach--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            @endif--}}
            <div class="col-md-12 col-lg-4 col-sm-12">
                <div class="card p-lg-5">
                    @if(session('success'))
                        <div class="alert alert-danger">
                            {{session('success')}}
                        </div>
                    @endif
                        @if(session('failed'))
                            <div class="alert alert-danger">
                                {{session('failed')}}
                            </div>
                        @endif
                        @if(session('message'))
                            <div class="alert alert-success">
                                {{session('message')}}
                            </div>
                        @endif
                    <h3 class="card-header text-center">Login</h3>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login.custom') }}">
                            @csrf
                            <div class="form-group mb-2">
                                <input type="text" placeholder="StudentID" id="StudentID" class="form-control" name="StudentID"
                                    autofocus>
                               @error('StudentID')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <input type="password" placeholder="Password" id="password" class="form-control" name="password">
                                @error('password')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                            <div class="d-grid mx-auto">
                                <a class="nav-link text-primary" href="{{ route('reset') }}">Forgot Password</a>

                                <button type="submit" class="btn btn-primary btn-block mt-2 mb-2">Signin</button>
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
