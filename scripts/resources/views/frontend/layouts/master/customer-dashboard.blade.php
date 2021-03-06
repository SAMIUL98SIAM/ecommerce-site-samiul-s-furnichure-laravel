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
           My Profile
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
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="img-circle txt-center">
                                        <img class="profile-user-img img-fluid img-circle" src="{{!empty($user->image)?url('/scripts/public/upload/user_image/'.$user->image):url('/upload/no_image.jpg/')}}" alt="User profile picture">
                                    </div>
                                    <h3 class="txt-center">{{$user->name}}</h3>
                                    <p class="txt-center">{{$user->address}}</p>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td>Mobile No</td>
                                                <td>{{$user->mobile}}</td>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td>{{$user->email}}</td>
                                            </tr>
                                            <tr>
                                                <td>Gender</td>
                                                <td>{{$user->gender}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <a class="btn btn-primary" href="{{route('frontend.customerEditProfile')}}">Edit Profile</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- Content page/ -->
@endsection
