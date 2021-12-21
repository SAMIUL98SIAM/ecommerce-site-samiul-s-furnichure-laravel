@extends('frontend.layouts.master')
@section('content')
    <!-- Title page -->
    <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{asset('/frontend/images/bg-01.jpg')}}');">
        <h2 class="ltext-105 cl0 txt-center">
            About Us
        </h2>
    </section>
    <!-- Title page/ -->

    <!-- Content page -->
    <section class="bg0 p-t-104 p-b-116">
        <div class="container">
            <div class="flex-w flex-tr">
                <div class="row">
                    <div class="col-md-12" style="border: 0.5px dashed grey;">
                        {{$about->description}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Content page/ -->
@endsection
