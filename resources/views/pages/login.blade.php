@extends('layouts.custom-master1')

@section('styles')
@endsection

@section('content')
<div class="">
    <div class="text-center">
        <a href="{{ url('index') }}">
            <img src="{{ asset('build/assets/images/brand/desktop-dark.png') }}" class="header-brand-img" alt="">
        </a>
    </div>
</div>

<div class="container-lg">
    <div class="row justify-content-center mt-4 mx-0">
        <div class="col-xl-4 col-lg-6">
            <div class="card shadow-none">
                <div class="card-body p-sm-6">
                    <div class="text-center mb-4">
                        <h4 class="mb-1">Sign In</h4>
                        <p>Sign in to your account to continue.</p>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.login.submit') }}">
                        @csrf

                        <div class="mb-3">
                            <label class="mb-2 fw-500">Email <span class="text-danger ms-1">*</span></label>
                            <input class="form-control" type="email" name="email" placeholder="Enter your Email" value="{{ old('email') }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="mb-2 fw-500">Password <span class="text-danger ms-1">*</span></label>
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>

                        <div class="d-flex mb-3">
                            <div class="form-check d-flex align-items-center">
                                <input class="form-check-input" type="checkbox" name="remember" id="flexCheckDefault">
                                <label class="form-check-label tx-15" for="flexCheckDefault">Remember me</label>
                            </div>
                            <div class="ms-auto">
                                <a href="{{ url('forgot-password') }}" class="tx-primary ms-1 tx-13">Forgot Password?</a>
                            </div>
                        </div>

                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>

                        <div class="text-center">
                            <p class="mb-0 tx-14">Don't have an account yet?
                                <a href="{{ url('register') }}" class="tx-primary ms-1 text-decoration-underline">Sign Up</a>
                            </p>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@endsection
