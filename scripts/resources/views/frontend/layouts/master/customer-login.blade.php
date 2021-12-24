@extends('frontend.layouts.master')
@section('styles')
<style>
.simple-login-container{
    width:300px;
    max-width:100%;
    margin:50px auto;
}
.simple-login-container h2{
    text-align:center;
    font-size:20px;
    margin-bottom: 12px;
}

.simple-login-container input{
    margin-bottom: 12px;
}
.simple-login-container .btn-login{
    background-color:#FF5964;
    color:#fff;
}
a{
    color:#fff;
}
</style>
@endsection

@section('content')
    <!-- Title page -->
    <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{asset('/frontend/images/bg-01.jpg')}}');">
        <h2 class="ltext-105 cl0 txt-center">
            Customer Login
        </h2>
    </section>
    <!-- Title page/ -->

    <!-- Content page -->
    <section class="bg0 p-t-104 p-b-116">
        <div class="container">
            <div class="simple-login-container">
                @if (Session::get('message'))
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>{{Session::get('message')}}</strong>
                    </div>
                @endif
                <h2>Login</h2>
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <input type="password" name="password" id="password" placeholder="Enter your Password" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <input type="submit" value="Login" class="btn btn-block btn-login">
                            <i class="fa fa-user"></i> No Account yet ? <a style="color: black;text-decoration:none;" href="{{route('frontend.customer.signup')}}"><span>SignUp new account</span></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Content page/ -->
@endsection
