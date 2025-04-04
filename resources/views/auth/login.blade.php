@extends('layouts.app')

@section('content')

<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
            <!-- Login -->
            <div class="card shadow-lg border-0 rounded-3">
                <div class="card-body p-4">
                    <!-- Logo -->
                    <div class="app-brand justify-content-center mb-4">
                        <a href="{{ url('/') }}" class="app-brand-link gap-2">
                            <span class="app-brand-logo demo">
                                <!-- SVG Logo (same as in Sneat template) -->
                                <svg width="25" viewBox="0 0 25 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <defs>
                                        <path d="M13.7918663,0.358365126 L3.39788168,7.44174259 C0.566865006,9.69408886 -0.379795268,12.4788597 0.557900856,15.7960551 C0.68998853,16.2305145 1.09562888,17.7872135 3.12357076,19.2293357 C3.8146334,19.7207684 5.32369333,20.3834223 7.65075054,21.2172976 L7.59773219,21.2525164 L2.63468769,24.5493413 C0.445452254,26.3002124 0.0884951797,28.5083815 1.56381646,31.1738486 C2.83770406,32.8170431 5.20850219,33.2640127 7.09180128,32.5391577 C8.347334,32.0559211 11.4559176,30.0011079 16.4175519,26.3747182 C18.0338572,24.4997857 18.6973423,22.4544883 18.4080071,20.2388261 C17.963753,17.5346866 16.1776345,15.5799961 13.0496516,14.3747546 L10.9194936,13.4715819 L18.6192054,7.984237 L13.7918663,0.358365126 Z"></path>
                                    </defs>
                                    <g id="g-app-brand" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <g id="Brand-Logo" transform="translate(-27.000000, -15.000000)">
                                            <g id="Icon" transform="translate(27.000000, 15.000000)">
                                                <g id="Mask" transform="translate(0.000000, 8.000000)">
                                                    <mask id="mask-2" fill="white"><use xlink:href="#path-1"></use></mask>
                                                    <use fill="#696cff" xlink:href="#path-1"></use>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                            </span>
                            <!-- /Logo -->
                            <h2 class="mb-3 text-center text-primary">Medicine Inventory System</h2>
                        </a>
                    </div>

                    <!-- Login Form -->
                    <form method="POST" action="{{ route('login') }}" class="mb-3">
                        @csrf

                        <div class="mb-4">
                            <label for="email" class="form-label text-muted">Email or Username</label>
                            <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autofocus placeholder="Enter your email or username">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-4 form-password-toggle">
                            <div class="d-flex justify-content-between">
                                <label class="form-label text-muted" for="password">Password</label>
                                <a href="{{ route('password.request') }}" class="small text-primary">Forgot Password?</a>
                            </div>
                            <div class="input-group input-group-merge">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="••••••••">
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-4 d-flex justify-content-between align-items-center">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    Remember Me
                                </label>
                            </div>
                            <a href="{{ route('register') }}" class="small text-muted">Don't have an account? Sign up</a>
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary w-100 py-2 rounded-pill shadow-sm border-0">Sign in</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /Login -->
        </div>
    </div>
</div>

@endsection

@section('styles')
<style>
    .authentication-wrapper {
        background: #f8f9fa;
        padding: 50px 0;
    }

    .card {
        max-width: 400px;
        margin: 0 auto;
        background-color: #fff;
        border-radius: 16px;
    }

    .card-body {
        padding: 30px;
    }

    .form-label {
        font-size: 1rem;
        color: #495057;
    }

    .form-control {
        border-radius: 8px;
        padding: 12px;
        border: 1px solid #ced4da;
    }

    .form-control:focus {
        border-color: #696cff;
        box-shadow: 0 0 0 0.25rem rgba(105, 108, 255, 0.25);
    }

    .btn {
        font-size: 1.1rem;
        font-weight: 600;
        transition: all 0.3s ease-in-out;
    }

    .btn-primary:hover {
        background-color: #5c61f4;
        border-color: #5c61f4;
    }

    .input-group-text {
        border-radius: 0 8px 8px 0;
    }

    .form-check-input {
        width: 1.2em;
        height: 1.2em;
        border-radius: 6px;
    }

    .app-brand h2 {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-size: 1.5rem;
        font-weight: bold;
    }

    .text-primary {
        color: #696cff !important;
    }

    .mb-4 {
        margin-bottom: 1.5rem;
    }

    .small {
        font-size: 0.875rem;
    }
</style>
@endsection
