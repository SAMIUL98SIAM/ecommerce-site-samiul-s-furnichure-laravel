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
            Customer Dashboard
        </h2>
    </section>
    <!-- Title page/ -->

    <!-- Content page -->
        <div class="container">
            <div class="row" style="padding: 15px 0px 15px 0px;">
                <div class="col-md-2">
                    <ul class="prof">
                        <<li><a href="{{route('frontend.dashboard')}}">My Profile</a></li>
                        <li><a href="{{route('frontend.customerPasswordChange')}}">Password Change</a></li>
                        <li><a href="{{route('frontend.customerOrderList')}}">My Orders</a></li>
                    </ul>
                </div>
                <div class="col-md-10">
                    <h3>Edit profile</h3>
                    <form method="POST" action="{{route('frontend.customerUpdateProfile')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <lebel>Full Name</lebel>
                                <input type="text" name="name" value="{{$editData->name}}" class="form-control">
                                <font style="color: red">{{($errors->has('name'))?($errors->first('name')):''}}</font>
                            </div>
                            <div class="col-md-4">
                                <lebel>Email</lebel>
                                <input type="email" name="email" value="{{$editData->email}}" class="form-control">
                                <font style="color: red">{{($errors->has('email'))?($errors->first('email')):''}}</font>
                            </div>
                            <div class="col-md-4">
                                <lebel>Mobile</lebel>
                                <input type="text" name="mobile" value="{{$editData->mobile}}" class="form-control">
                                <font style="color: red">{{($errors->has('mobile'))?($errors->first('mobile')):''}}</font>
                            </div>
                            <div class="col-md-4">
                                <lebel>Address</lebel>
                                <input type="text" name="address" value="{{$editData->address}}" class="form-control">
                                <font style="color: red">{{($errors->has('address'))?($errors->first('address')):''}}</font>
                            </div>
                            <div class="col-md-4">
                                <label class="gender">Customer Gender</label>
                                <select name="gender" id="gender" class="form-control">
                                    <option value="">Select gender</option>
                                    <option value="Male"{{($editData->gender=="Male")?"selected":""}}>Male</option>
                                    <option value="Female"{{($editData->gender=="Female")?"selected":""}}>Female</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="image">Image</label>
                                <input type="file" name="image" class="form-control" id="image">
                            </div>
                            <div class="col-md-2">
                                <img id="showImage" src="{{!empty($editData->image) ? url('/scripts/public/upload/user_image/'.$editData->image):url('/upload/no_image.jpg')}}" alt="User profile picture" style="width:90px; height:90px; border:1px solid #000;">

                            </div>
                            <div class="col-md-4" style="padding-top: 30px;">
                                <button type="submit" class="btn btn-primary">Profile Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <!-- Content page/ -->
@endsection
