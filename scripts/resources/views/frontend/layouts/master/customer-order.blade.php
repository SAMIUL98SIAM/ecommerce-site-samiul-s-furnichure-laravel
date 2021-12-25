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
            My Order
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
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Order no</th>
                                <th>Total Amount</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                            <tr>
                                <td># {{$order->order_no}}</td>
                                <td>{{$order->order_total}}</td>
                                <td>
                                    @if($order->status==0) <span style="background-color: #DD4F42;padding:5px;color:#fff">Unapproved</span>
                                    @elseif($order->status==1) <span style="background-color: blue;padding:5px;color:#fff">Approved</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> Details</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <!-- Content page/ -->
@endsection
