@extends('front.layout.master')



@section('content')

    <!-- Start Banner Area -->
@section('breadcrumb')
    @include('front.layout.partials.breadcrumb')
@endsection
<!-- End Banner Area -->

<!--================Login Box Area =================-->
<section class="login_box_area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="login_box_img">
                    <img class="img-fluid" src="{{ asset('front/img/login.jpg') }}" alt="">
                    <div class="hover">
                        <h4>New to our website?</h4>
                        <p>There are advances being made in science and technology everyday, and a good example of this
                            is the</p>
                        <a class="primary-btn" href="{{ route('signup') }}">Create an Account</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="login_form_inner">
                    <h3>Log in to enter</h3>
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <p class="text-danger">{{ $error }}</p>
                        @endforeach
                    @endif
                    <form class="row login_form" action="{{ route('login') }}" method="post" id="contactForm"
                        novalidate="novalidate">
                        @csrf
                        <div class="col-md-12 form-group">
                            <input type="email" class="form-control" id="name" name="email" placeholder="Email"
                                onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'">
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="password" class="form-control" id="name" name="password"
                                placeholder="Password Confirm" onfocus="this.placeholder = ''"
                                onblur="this.placeholder = 'Password Confirm'">
                        </div>

                        <div class="col-md-12 form-group">
                            <button type="submit" value="submit" class="primary-btn">Log In</button>
                            <a href="#">Forgot Password?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Login Box Area =================-->
@endsection
