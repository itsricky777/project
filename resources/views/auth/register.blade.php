@extends('layouts.app')
<style>
    .warna{

        background-color: #212529;
        width: 100%;
    }
</style>
@section('content')
<div class="warna">
    <div class="container" style="padding-top:70px;padding-bottom: 10px;">
      <div class="card login-card">
        <div class="row no-gutters" >
            <div class="col-md-5">
            <img src="{{URL::asset('assets/img/Custom-PC-Builder-Fast-Fix-Computer-Repair.jpg')}}" alt="login" class="login-card-img">
          </div>
          <div class="col-md-7">
            <div class="card-body" >
              <div class="brand-wrapper">
                <img src="{{URL::asset('assets/img/navbar-logo.png')}}" alt="logo" class="logo" style=" width:150px;height: 50px; ">
              </div>
              <p class="login-card-description">Sign Up Into PoSoft</p>
              <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group mb-4">
                    <label for="email" class="sr-only">Name</label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                  </div>
                  <div class="form-group mb-4">
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email address" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                  </div>
                  <div class="form-group mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                  </div>
                  <div class="form-group mb-4">
                    <label for="password" class="sr-only">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password-confirm" class="form-control" placeholder="Confirm Password" autocomplete="new-password">
                  </div>
                  <button class="btn btn-block login-btn mb-4" type="submit">
                    {{ __('Register') }}
                  </button>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
