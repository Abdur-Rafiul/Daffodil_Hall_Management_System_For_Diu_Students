@extends('Frontend.Layout.appSupported')
@section('title', 'Password Reset')
@section('content')
    {{-- @include('Frontend.auth.dashboard') --}}

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-12 col-sm-12">
                <div class="card">
                    <div class="card-header">Verify Your Email Address</div>
                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('A fresh verification link has been sent to your email address.') }}
                            </div>
                        @endif


                        <a href="{{ route('reset.password.get', $token) }}">Reset Password</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="fixed-bottom">

        {{-- @include('Frontend.Footer') --}}
    </div>
@endsection
