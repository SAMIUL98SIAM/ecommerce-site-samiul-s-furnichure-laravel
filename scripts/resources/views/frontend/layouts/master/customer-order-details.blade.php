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
    .mytable tr td{
        padding: 10px;
    }
</style>
@endsection
@section('content')
    <!-- Title page -->
    <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{asset('/frontend/images/bg-01.jpg')}}');">
        <h2 class="ltext-105 cl0 txt-center">
            My Order Details
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
                    <table class="txt-center mytable" width="100%" border="1">
                        <tr>
                            <td width="30%"><img src="{{!empty($logo->image)?url('/scripts/public/upload/logo_image/'.$logo->image):url('/upload/no_image.jpg/')}}" alt="IMG-LOGO"></td>
                            <td width="40%">
                                <h4><strong>Furnish Furniture</h4></strong>
                                <span><strong>Mobile No: </strong> {{$contact->mobile_no}}</span><br/>
                                <span><strong>Email:</strong> {{$contact->email}}</span><br/>
                                <span><strong>Address: </strong>{{$contact->address}}</span><br/>
                            </td>
                            <td width="30%"><strong>Order No: #</strong> {{$order->order_no}}</td>
                        </tr>
                        <tr>
                            <td><strong>Billing Info:</strong></td>
                            <td colspan="2" style="text-align: left;">
                                <strong>Name: </strong> {{$order->shipping->name}} &nbsp;&nbsp;&nbsp;&nbsp;
                                <strong>Mobile no: </strong> {{$order->shipping->mobile_no}} &nbsp;&nbsp;&nbsp;&nbsp;<br/>
                                <strong>Email: </strong> {{$order->shipping->email}} &nbsp;&nbsp;&nbsp;&nbsp;
                                <strong>Address: </strong> {{$order->shipping->address}} &nbsp;&nbsp;&nbsp;&nbsp;<br/>
                                <strong>Payment: </strong>
                                {{$order->payment->payment_method}}
                                @if ($order->payment->payment_method=='Bkash')
                                (Transaction no: {{$order->payment->transaction_no}})
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">Order Details</td>
                        </tr>
                        <tr>
                            <td><strong>Product Name & Image</strong></td>
                            <td><strong>Color & Size</strong></td>
                            <td><strong>Quantity & Price</strong></td>
                        </tr>
                        @foreach ($order->order_details as $details)
                        <tr>
                            <td>
                                <img src="{{!empty($details->product->image) ? url('/scripts/public/upload/product_image/'.$details->product->image):url('/upload/no_image.jpg')}}" width="50px" height="55px"> &nbsp; {{$details->product->name}}
                            </td>
                            <td>
                                {{$details->color->name}} &nbsp; & &nbsp; {{$details->size->name}}
                            </td>
                            <td>
                                @php
                                    $sub_total = $details->quantity*$details->product->price ;
                                @endphp
                                {{$details->quantity}} X {{$details->product->price}} = {{$sub_total}}
                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="2" style="text-align: right;">GrandTotal</td>
                            <td><strong>{{$order->order_total}}</strong></td>
                        </tr>

                    </table>
                </div>
            </div>
        </div>
    <!-- Content page/ -->
@endsection
