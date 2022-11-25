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
          <p class="card-text mb-2">Please sign-in to your account to access the dashboard</p>

        <form class="auth-login-form mt-2" action="{{ route('login') }}" method="post">
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

          <div class="mb-1">
            <div class="d-flex justify-content-between">
              <label class="form-label" for="login-password">Password</label>
              <a href="{{route('password.request')}}">
                <small>Forgot Password?</small>
              </a>
            </div>
            <div class="input-group input-group-merge form-password-toggle">
              <input
                type="password"
                class="form-control form-control-merge"
                id="login-password"
                name="password"
                tabindex="2"
                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                aria-describedby="login-password"
                required
              />
              <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
            </div>
              <x-input-error input-name="password" />
          </div>
          <div class="mb-1">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="remember-me" name="remember" tabindex="3"/>
              <label class="form-check-label" for="remember-me"> Remember Me </label>
            </div>
          </div>
          <button class="btn btn-primary w-100" tabindex="4">Sign in</button>
        </form>
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
