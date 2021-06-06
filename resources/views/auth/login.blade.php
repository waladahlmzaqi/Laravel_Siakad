@extends('auth.layouts.app')
@push('link')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
@endpush
@section('content')
<div class="login-page">
    <div class="form">
        <div class="hero">
            <p>SIAKAD</p>
        </div>
        <hr><br>
        <form class="login-form" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="row g-3 align-items-center">
                <div class="col-auto">
                  <label for="email" class="col-form-label label">Email</label>
                </div>
                <div class="col-9 email">
                    <input id="email" type="email" placeholder="Email Address" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
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
                    <input type="password" id="password" placeholder="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        <br>
                    @enderror
                </div>
            </div>
            <div class="row g-3 align-items-center mb-2">
                <div class="col-6 ms-3">
                    <input type="checkbox" id="show-pw">
                </div>
                <div class="col-4" style="margin-left: -100px">
                    <label for="" class=" label">Show password</label>
                </div>
            </div>
            <div>
                <button type="submit">login</button>
                <p class="message">
                @if (Route::has('password.request'))
                    {{-- <a class="me-1" href="{{ route('password.request') }}">
                        Forgot Your Password?
                    </a> --}}
                    <a class="me-1" href="">
                        Forgot Your Password?
                    </a>
                @endif
                Or <a class="ms-1" href="/register">Register</a>
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
        $('#password').attr('type','text');
        }else{
        $('#password').attr('type','password');
        }
        });
    });
</script>
@endpush
