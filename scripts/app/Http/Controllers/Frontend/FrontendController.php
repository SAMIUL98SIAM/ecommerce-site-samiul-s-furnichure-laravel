<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.layouts.master.home');
    }
    public function product_detail()
    {
        return view('frontend.layouts.master.product-detail');
    }

    public function shopping_cart()
    {
        return view('frontend.layouts.master.shopping-cart');
    }

    public function contact_us()
    {
        return view('frontend.layouts.master.contact-us');
    }
}
