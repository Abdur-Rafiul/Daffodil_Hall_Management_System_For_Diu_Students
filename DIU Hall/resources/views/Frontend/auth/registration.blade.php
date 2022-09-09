@extends('Frontend.Layout.app')
@section('content')
<main class="signup-form">
    <div class="cotainer-fluid p-5 h-100">
        <div class="row justify-content-center p-5">
            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header text-center">Register User</h3>
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-danger">
                                {{session('success')}}
                            </div>
                        @endif
                        <form action="{{ route('register.custom') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Name" id="name" class="form-control" name="name"
                                     autofocus>
                                @error('name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <input type="text" placeholder="StudentID" id="StudentID" class="form-control" name="StudentID"
                                        autofocus>
                                    @error('StudentID')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                            </div>

                            <div class="form-group mb-3">
                                <input type="text" placeholder="Email" id="email_address" class="form-control"
                                    name="email"  autofocus>
                                @error('email')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <input type="password" placeholder="Password" id="password" class="form-control"
                                    name="password" >
                                @error('password')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <div class="checkbox">
{{--                                    <label><input type="checkbox" name="remember"> Remember Me</label>--}}
                                </div>
                            </div>
                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-primary btn-block">Sign up</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
