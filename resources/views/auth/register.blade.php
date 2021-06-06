@extends('auth.layouts.app')
@push('link')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
@endpush
@section('content')

<div class="login-page">
    <div class="form">
        <div class="hero">
            <p>Register</p>
        </div>
        <hr><br>
        <form class="login-form" method="POST" action="{{ route('register') }}">
            @csrf
            <div class="row g-3 align-items-center">
                <div class="col-auto">
                  <label for="name" class="col-form-label label">Name</label>
                </div>
                <div class="col-9 name">
                    <input placeholder="Name" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert" style="margin-top: -10px; margin-bottom: 20px;">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row g-3 align-items-center">
                <div class="col-auto">
                  <label for="email" class="col-form-label label">Email</label>
                </div>
                <div class="col-9 email">
                    <input placeholder="Email Address" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                        <span class="invalid-feedback" role="alert" style="margin-top: -10px; margin-bottom: 20px;">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row g-3 align-items-center">
                <div class="col-auto">
                  <label class="col-form-label label">Password</label>
                </div>
                <div class="col-9 pw">
                    <input type="password" id="password" placeholder="password" class="form-control password @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        <br>
                    @enderror
                </div>
            </div>
            <div class="row g-3 align-items-center">
                <div class="col-auto">
                  <label class="col-form-label label">Confirm Password</label>
                </div>
                <div class="col-7 confirm-pw">
                    <input placeholder="Confirm Password" id="password-confirm" type="password" class="form-control password" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>
            <div class="row g-3 align-items-center mb-2">
                <div class="col-1">
                    <input type="checkbox" id="show-pw">
                </div>
                <div class="col-4" style="margin-left: -15px">
                    <label for="" class="label">Show password</label>
                </div>
            </div>
            <div>
                <button type="submit">Register</button>
                <p class="message">Have Account?
                <a class="ms-1" href="/login">Login Here</a>
                </p>
            </div>
        </form>
    </div>
</div>
@endsection
@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
	$(document).ready(function(){
    $('#show-pw').click(function(){
        if($(this).is(':checked')){
        $('.password').attr('type','text');
        }else{
        $('.password').attr('type','password');
        }
        });
    });
</script>
@endpush
