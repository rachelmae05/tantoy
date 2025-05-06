@extends('layouts.app')

@section('content')<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner">
      <!-- Register Card -->
      <div class="card px-sm-6 px-0">
        <div class="card-body">
          <h4 class="mb-1">Adventure starts here 🚀</h4>
          <p class="mb-6">Make your app management easy and fun!</p>

          <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="username" name="name" placeholder="Enter your username" value="{{ old('name') }}" autofocus />
                @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter your email" value="{{ old('email') }}" />
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="mb-3 form-password-toggle">
                <label class="form-label" for="password">Password</label>
                <div class="input-group input-group-merge">
                    <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="••••••••" />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                </div>
                @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm your password" />
            </div>
            <div class="mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" />
                    <label class="form-check-label" for="terms-conditions">I agree to <a href="#">privacy policy & terms</a></label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary d-grid w-100">Sign up</button>
          </form>

          <!-- Login Link -->
          <p class="text-center mt-4">
            <span>Already have an account?</span>
            <a href="{{ route('login') }}">
              <span>Sign in instead</span>
            </a>
          </p>
        </div>
      </div>
      <!-- Register Card -->
    </div>
  </div>
</div>

</div>
@endsection