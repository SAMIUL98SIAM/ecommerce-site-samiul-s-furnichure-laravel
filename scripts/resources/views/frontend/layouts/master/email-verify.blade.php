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
            Verification Form
        </h2>
    </section>
    <!-- Title page/ -->

    <!-- Content page -->
    <section class="bg0 p-t-104 p-b-116">
        <div class="container">
            <div class="simple-login-container">
                <h2>Email Verify</h2>
                <form action="" method="post">
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <input type="code" name="code" id="code" placeholder="Verify Code" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <input type="submit" value="submit" class="btn btn-block btn-login">

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Content page/ -->
@endsection
