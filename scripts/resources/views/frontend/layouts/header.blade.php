@php
    $contents = Cart::content();
    $total = '0';
@endphp
<header>
    <!-- Header desktop -->
    <div class="container-menu-desktop">
        <!-- Topbar -->
        <div class="top-bar">
            <div class="content-topbar flex-sb-m h-full container">
                <div class="left-top-bar">
                    <font size="3px" color="#fff">
                        01992569682 &nbsp;&nbsp;&nbsp;
                        samiulsiam59@gmail.com
                    </font>
                </div>

                <div class="right-top-bar flex-w h-full">
                    <ul class="social">
                        <li class="facebook"><a href="{{$contact->facebook}}"><i class="fa fa-facebook"></i></a></li>
                        <li class="twitter"><a href="{{$contact->twitter}}"><i class="fa fa-twitter"></i></a></li>
                        <li class="google-plus"><a href="{{$contact->google_plus}}"><i class="fa fa-google-plus"></i></a></li>
                        <li class="youtube"><a href="{{$contact->youtube}}"><i class="fa fa-youtube-play"></i></a></li>
                        <li class="linkedin"><a href="{{$contact->linkedin}}"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="wrap-menu-desktop">
            <nav class="limiter-menu-desktop container">

                <!-- Logo desktop -->
                <a href="{{route('frontend.home')}}" class="logo">
                    {{-- <img src="{{asset('/frontend/images/logo/logo.png')}}" alt="IMG-LOGO"> --}}
                    <img src="{{!empty($logo->image)?url('/scripts/public/upload/logo_image/'.$logo->image):url('/upload/no_image.jpg/')}}" alt="IMG-LOGO">
                </a>

                <!-- Menu desktop -->
                <div class="menu-desktop">
                    <ul class="main-menu">
                        <li class="active-menu">
                            <a href="{{route('frontend.home')}}">HOME</a>
                        </li>
                        <li class="active-menu">
                            <a href="#">SHOPS</a>
                            <ul class="sub-menu">
                                <li><a href="{{route('frontend.product_list')}}">Products</a></li>
                                <li><a href="">Checkout</a></li>
                                <li><a href="{{route('frontend.shopping_cart')}}">Cart</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{route('frontend.about_us')}}">ABOUT US</a>
                        </li>
                        <li>
                            <a href="{{route('frontend.contact_us')}}">CONTACT US</a>
                        </li>

                        @if (@Auth::user()->id != Null)
                        <li>
                            <a href="#">Accounts</a>
                            <ul class="sub-menu">
                                <li><a href="">My Profile</a></li>
                                <li><a href="">Password Changes</a></li>
                                <li><a href="">My Orders</a></li>
                                <li>
                                    <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="dropdown-item dropdown-footer">Logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf</form>
                                </li>

                            </ul>
                        </li>
                        @else
                        <li><a href="{{route('frontend.customer.login')}}">LOGIN</a></li>
                        @endif

                    </ul>
                </div>

                <!-- Icon header -->
                <div class="wrap-icon-header flex-w flex-r-m">
                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="{{Cart::count()}}">
                        <i class="zmdi zmdi-shopping-cart"></i>
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <!-- Header Mobile -->
    <div class="wrap-header-mobile">
        <!-- Logo moblie -->
        <div class="logo-mobile">
            <a href="{{route('frontend.home')}}"><img src="{{asset('/frontend/images/logo/logo.png')}}" alt="IMG-LOGO"></a>
        </div>

        <!-- Icon header -->
        <div class="wrap-icon-header flex-w flex-r-m m-r-15">
            <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="{{Cart::count()}}">
                <i class="zmdi zmdi-shopping-cart"></i>
            </div>
        </div>

        <!-- Button show menu -->
        <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </div>
    </div>

    <!-- Menu Mobile -->
    <div class="menu-mobile">
        <ul class="topbar-mobile">
            <li>
                <div class="left-top-bar">
                    <font size="3px" color="#fff">
                        01928511049 &nbsp;&nbsp;&nbsp;
                        asadullahkpi@gmail.com
                    </font>
                </div>
            </li>

            <li>
                <div class="right-top-bar flex-w h-full">
                    <ul class="social">
                        <li class="facebook"><a href="{{$contact->facebook}}"><i class="fa fa-facebook"></i></a></li>
                        <li class="twitter"><a href="{{$contact->twitter}}"><i class="fa fa-twitter"></i></a></li>
                        <li class="google-plus"><a href="{{$contact->google_plus}}"><i class="fa fa-google-plus"></i></a></li>
                        <li class="youtube"><a href="{{$contact->youtube}}"><i class="fa fa-youtube-play"></i></a></li>
                        <li class="linkedin"><a href="{{$contact->linkedin}}"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </li>
        </ul>

        <ul class="main-menu-m">
            <li><a href="{{route('frontend.home')}}">Home</a></li>
            <li>
                <a href="#">SHOPS</a>
                <ul class="sub-menu-m">
                    <li><a href="{{route('frontend.product_list')}}">Products</a></li>
                    <li><a href="">Checkout</a></li>
                    <li><a href="{{route('frontend.shopping_cart')}}">Cart</a></li>
                </ul>
                <span class="arrow-main-menu-m">
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                </span>
            </li>
            <li>
                <a href="{{route('frontend.about_us')}}">ABOUT US</a>
            </li>
            <li>
                <a href="{{route('frontend.contact_us')}}">CONTACT US</a>
            </li>

            @if (@Auth::user()->id != Null)
            <li>
                <a href="#">Accounts</a>
                <ul class="sub-menu-m">
                    <li><a href="">My Profile</a></li>
                    <li><a href="">Password Changes</a></li>
                    <li><a href="">My Orders</a></li>
                    <li>
                        <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="dropdown-item dropdown-footer">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf</form>
                    </li>
                </ul>
                <span class="arrow-main-menu-m">
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                </span>
            </li>
            @else
            <li><a href="{{route('frontend.customer.login')}}">LOGIN</a></li>
            @endif

        </ul>
    </div>
</header>

