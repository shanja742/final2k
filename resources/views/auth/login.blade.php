@extends('frontend.layouts.main')

@section('content')

<div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Login/Register</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">

            <div class="row">
                <div class="col-md-11">
                    <div class="single-sidebar">
                        <div id="login-form-wrap" class="login" method="post">
                            <p>If you are a member with us before, please enter your details in the login box to continue shopping. If you are a new customer please proceed to the Register to join with us. <a href="{{route('register')}}">Register here..</a></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                <div class="single-sidebar">
                        <h2 class="sidebar-title">Login to continue..</h2>
                            <form id="login-form-wrap" class="login" method="POST" action="{{ route('login') }}">
                            @csrf

                                <p>If you are a member with us before, please enter your details in the boxes below.</p>

                                <p class="form-row form-row-first">
                                    <label for="email">E-mail Address<span class="required">*</span>
                                    </label>
                                    <input type="email" id="email" name="email" class="input-text @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                </p>
                                <p class="form-row form-row-last">
                                    <label for="password">Password <span class="required">*</span>
                                    </label>
                                    <input id="password" type="password" class="input-text @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                </p>
                                <div class="clear"></div>


                                <p class="form-row">
                                    <input type="submit" value="Login" name="login" class="button">
                                    <label class="inline" for="rememberme"><input type="checkbox" value="forever" id="rememberme" name="rememberme"> Remember me </label>
                                </p>
                                <p class="lost_password">
                                    <a href="#">Lost your password?</a>
                                </p>

                                <div class="clear"></div>
                            </form>
                    </div>

                </div>

            </div>
        </div>
    </div>

@endsection