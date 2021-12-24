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
            Customer SignUp
        </h2>
    </section>
    <!-- Title page/ -->

    <!-- Content page -->
    <section class="bg0 p-t-104 p-b-116">
        <div class="container">
            <div class="simple-login-container">
                <h2 >Sign up</h2>
                <form action="{{route('frontend.customer.signup.store')}}" id="myForm" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <input type="name" name="name" id="name" class="form-control" placeholder="Username">
                        </div>
                        <font style="color: red">{{($errors->has('name'))?($errors->first('name')):''}}</font>
                    </div>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                        </div>
                        <font style="color: red">{{($errors->has('email'))?($errors->first('email')):''}}</font>
                    </div>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <input type="mobile" name="mobile" id="mobile" class="form-control" placeholder="Mobile no">
                        </div>
                        <font style="color: red">{{($errors->has('mobile'))?($errors->first('mobile')):''}}</font>
                    </div>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <input type="password" name="password" id="password" placeholder="Enter your Password" class="form-control">
                        </div>
                        <font style="color: red">{{($errors->has('password'))?($errors->first('password')):''}}</font>
                    </div>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <input type="password" name="confirmation_password" id="confirmation_password" placeholder="Confirm Password" class="form-control">
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <input type="submit" value="Signup" class="btn btn-block btn-login">
                            <i class="fa fa-user"></i> Have you account ? <a style="color: black;text-decoration:none;" href="{{route('frontend.customer.login')}}"><span>Login here</span></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Content page/ -->
@endsection

@section('scripts')
<script>
    $(function () {
      $('#myForm').validate({
        rules: {
         mobile: {
              required: true,
          },
          name: {
              required: true,
          },
          email: {
            required: true,
            email: true,
          },
          password: {
            required: true,
            minlength: 6
          },
          confirmation_password: {
              required: true,
              equalTo: '#password'
          }

        },
        messages: {
          mobile: {
            required: "Please enter a mobile number",
          },
          name: {
            required: "Please enter a full name",
          },
          email: {
            required: "Please enter a email address",
            email: "Please enter a vaild email address"
          },
          password: {
            required: "Please enter a password",
            minlength: "Your password must be at least 6 characters long"
          },
          confirmation_password: {
            required: "Please enter a confirm password",
            equalTo: "Confirm password doesn't match"
          },

        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });
    });
</script>
@endsection
