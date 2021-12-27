@extends('frontend.layouts.master')
@section('style')
    <style>
        .active{
            background-color: azure;
            color: black;
        }
    </style>
@endsection
@section('content')
    <!-- Slider -->
    <section class="section-slide">
        <div class="wrap-slick1">
            <div class="slick1">
                @foreach ($sliders as $slider)
                <div class="item-slick1" style="background-image: url({{asset('/scripts/public/upload/slider_image/'.$slider->image)}});">
                    <div class="container h-full">
                        <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
                            <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
                                <span class="ltext-101 cl2 respon2">
                                    {{$slider->short_title}}
                                </span>
                            </div>

                            <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
                                <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
                                    {{$slider->long_title}}
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Slider/ -->
    @php
    $route = Route::current()->getName();
    @endphp
    <!-- Product -->
    <section class="bg0 p-t-23 p-b-140">
        <div class="container">
            <div class="flex-w flex-sb-m p-b-52">
                <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                    <a class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 {{$route==('frontend.product_list') ? 'how-active1':''}}" href="{{route('frontend.product_list')}}">All Product</a>

                    @foreach ($categories as $category)
                    <a class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 {{request()->is('product-category/'.$category->category_id) ? 'how-active1':''}}" href="{{route('frontend.categoryWiseProduct',$category->category_id)}}">{{$category->category->name}}</a>
                    @endforeach
                </div>

                <div class="flex-w flex-c-m m-tb-10">
                    <div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
                        <i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
                        <i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                        Filter
                    </div>

                    <div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
                        <i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
                        <i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                        Search
                    </div>
                </div>

                <!-- Search product -->
                <div class="dis-none panel-search w-full p-t-10 p-b-15">
                    <div class="bor8 dis-flex p-l-15">
                        <button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
                            <i class="zmdi zmdi-search"></i>
                        </button>

                        <input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product" placeholder="Search">
                    </div>
                </div>

                <!-- Filter -->
                <div class="dis-none panel-filter w-full">
                    <div class="wrap-filter flex-w w-full" style="background-color: #858585;">
                        <div>
                            <div style="padding: 20px; font-size: 25px; color: #fff">
                                Brands
                            </div>
                            <div style="padding: 0px 20px 20px 20px;">
                                @foreach ($brands as $brand)
                                <a class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 {{request()->is('product-brand/'.$brand->brand_id) ? 'active':''}}" href="{{route('frontend.brandWiseProduct',$brand->brand_id)}}" class="filter-link stext-106 trans-04" style="color: #fff">{{$brand->brand->name}}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row isotope-grid">
                @foreach ($products as $product)
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                    <!-- Block2 -->
                    <div class="block2">
                        <div class="block2-pic hov-img0">
                            <img src="{{!empty($product->image) ? url('/scripts/public/upload/product_image/'.$product->image):url('/upload/no_image.jpg')}}" width="180px" height="200px" alt="IMG-PRODUCT">

                            <a href="{{route('frontend.product_details',$product->slug)}}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
                                Add to Card
                            </a>
                        </div>

                        <div class="block2-txt flex-w flex-t p-t-14">
                            <div class="block2-txt-child1 flex-col-l ">
                                <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                    {{$product->name}}
                                </a>

                                <span class="stext-105 cl3">
                                    {{$product->price}} TK
                                </span>
                            </div>

                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            {{$products->links()}}

        </div>
    </section>
    <!-- Product/ -->
@endsection

