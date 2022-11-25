@extends('layouts/fullLayoutMaster')

@section('title', 'Login Page')

@push('page-style')
  {{-- Page Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/pages/authentication.css')) }}">
@endpush

@section('content')
<div class="auth-wrapper auth-basic px-2">
  <div class="auth-inner my-2">
    <!-- Login basic -->
    <div class="card mb-0">
      <div class="card-body">
        <a href="#" class="brand-logo">
          <h2 class="brand-text text-primary ms-1">@appName</h2>
        </a>

          <x-alert />

          <p class="mt-0">Forgot password?</p>
        <form class="mt-2" action="{{ route('password.email') }}" method="post">
            @csrf
          <div class="mb-1">
            <label for="login-email" class="form-label">Email</label>
              <input
                  type="text"
                  class="form-control @error('email') is-invalid @enderror"
                  id="login-email"
                  name="email"
                  placeholder="admin@test.com"
                  aria-describedby="email"
                  tabindex="1"
                  autofocus
                  required
              />
              <x-input-error input-name="email" />
          </div>

          <button class="btn btn-primary w-100" tabindex="4">Send Password Reset Link</button>
        </form>

          <div class="mt-1"><a href="{{ route('login') }}">Back to login.</a></div>
      </div>
    </div>
    <!-- /Login basic -->
  </div>
</div>
@endsection

@section('vendor-script')
<script src="{{asset(mix('vendors/js/forms/validation/jquery.validate.min.js'))}}"></script>
@endsection

@push('page-script')
<script src="{{asset(mix('js/scripts/pages/auth-login.js'))}}"></script>
@endpush
