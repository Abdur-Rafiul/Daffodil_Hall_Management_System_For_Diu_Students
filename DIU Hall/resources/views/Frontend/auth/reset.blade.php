@extends('Frontend.Layout.appSupported')
@section('title','Password Reset')
@section('content')
    @include('Frontend.auth.dashboard')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-5 col-sm-12 mt-4">
                <div class="card p-5 mt-5">
                    <h4 class="card-header text-center text-primary">Verify Your Email Address</h4>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="/forget-password">
                            @csrf
                            <div class="form-group row">

                                <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                <div class=" ">
                                    <input id="email" type="email" class="form-control" placeholder="Please Enter Your Email Address" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="mt-2">
                                    <button type="submit" class="btn btn-primary">
                                        Send Password Reset Link
                                    </button>
                                </div>
                            </div>
                        </form>
    </div>
    </div>
    </div>
    </div>
    </div>

    <div class="fixed-bottom">

        @include('Frontend.Footer')
    </div>
@endsection
