@extends('frontend.layouts.master')
@section('styles')
<style>
    .prof li{
        background-color: #1781BF;
        padding: 7px;
        margin: 3px;
        border-radius: 15px;
    }
    .prof li a{
        color: #fff;
        padding-left: 15px;
    }
</style>
@endsection
@section('content')
    <!-- Title page -->
    <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{asset('/frontend/images/bg-01.jpg')}}');">
        <h2 class="ltext-105 cl0 txt-center">
            Password Change
        </h2>
    </section>
    <!-- Title page/ -->

    <!-- Content page -->
        <div class="container">
            <div class="row" style="padding: 15px 0px 15px 0px;">
                <div class="col-md-2">
                    <ul class="prof">
                        <li><a href="{{route('frontend.dashboard')}}">My Profile</a></li>
                        <li><a href="{{route('frontend.customerPasswordChange')}}">Password Change</a></li>
                        <li><a href="{{route('frontend.customerOrderList')}}">My Orders</a></li>
                    </ul>
                </div>
                <div class="col-md-10">
                    <h3>Password Change</h3>
                    <form method="POST" action="{{route('frontend.customerPasswordUpdate')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label class="current_password">Current Password</label>
                                <input type="password" name="current_password" id="current_password" class="form-control" placeholder="Current Password">
                            </div>
                            <div class="form-group col-md-4">
                                <label class="new_password">New Password</label>
                                <input type="password" name="new_password" id="new_password" class="form-control" placeholder="New Password">
                            </div>
                            <div class="form-group col-md-4">
                                <label class="again_new_password">Again New Password</label>
                                <input type="password" name="again_new_password" id="again_new_password" class="form-control" placeholder="Again New Password">
                            </div>
                        </div>
                        <div class="col-3" style="padding-top: 30px;">
                            <input type="submit" value="Password Update" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <!-- Content page/ -->
@endsection
