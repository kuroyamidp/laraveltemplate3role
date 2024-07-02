@extends('layouts.app')

@section('content')
@extends('layouts.app')

@section('content')
<style>
    .form-container {
        position: relative;
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }

    .form-background {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: url('../assets/img/bg.jpg') no-repeat center center;
        background-size: cover;
        z-index: -1;
        opacity: 0.5; /* Adjust the opacity as needed */
    }

    .form-content {
        position: relative;
        z-index: 1;
        background-color: rgba(255, 255, 255, 0.8); /* Adjust the background transparency as needed */
        padding: 2rem;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .form-form-wrap {
        max-width: 400px;
        width: 100%;
    }

    .logo-image-small {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 1rem;
    }

    .logo-image-small img {
        max-width: 100px;
        height: auto;
    }
</style>

<div class="form-container">
    <div class="form-form">
        <div class="form-form-wrap">
            <div class="form-container">
                <div class="form-content">
                    <div class="logo-image-small">
                        <img src="../assets/img/skema.png" alt="Logo">
                    </div>
                    <form class="text-left" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form">

                            <div id="username-field" class="field-wrapper input">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                                <input id="username" placeholder="Email" name="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div id="password-field" class="field-wrapper input mb-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock">
                                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                </svg>
                                <input id="password" placeholder="Password" name="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <!-- <div class="row mb-1">
                                <div class="col-lg-12 d-flex justify-content-center">
                                    {!! NoCaptcha::display() !!}
                                    {!! NoCaptcha::renderJs() !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 d-flex justify-content-center">
                                    @error('g-recaptcha-response')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div> -->
                            <div class="d-sm-flex justify-content-between">

                                <div class="field-wrapper toggle-pass">
                                    <p class="d-inline-block">Show Password</p>
                                    <label class="switch s-primary">
                                        <input type="checkbox" id="toggle-password" class="d-none">
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                                <div class="field-wrapper">
                                    <button type="submit" class="btn btn-primary" value="">Log In</button>
                                </div>

                            </div>

                            <div class="field-wrapper text-center keep-logged-in">
                                <div class="n-chk new-checkbox checkbox-outline-primary">
                                    <label class="new-control new-checkbox checkbox-outline-primary">
                                        <input type="checkbox" class="new-control-input">
                                        <!-- <span class="new-control-indicator"></span>Keep me logged in -->
                                    </label>
                                </div>
                            </div>

                            <div class="field-wrapper">
                                <!-- <a href="/register" class="forgot-pass-link">Register sekarang</a> -->
                            </div>

                        </div>
                    </form>
                    <br>
                  
                   
                </div>
            </div>
        </div>
    </div>
    <div class="form-background"></div>
</div>
@endsection