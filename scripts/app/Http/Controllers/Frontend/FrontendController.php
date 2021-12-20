<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Logo;
use App\Models\Slider;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $data['logo'] = Logo::first();
        $data['sliders'] = Slider::all();
        return view('frontend.layouts.master.home',$data);
    }
    public function product_detail()
    {
        $data['logo'] = Logo::first();
        return view('frontend.layouts.master.product-detail',$data);
    }

    public function shopping_cart()
    {
        $data['logo'] = Logo::first();
        return view('frontend.layouts.master.shopping-cart',$data);
    }

    public function contact_us()
    {
        $data['logo'] = Logo::first();
        return view('frontend.layouts.master.contact-us',$data);
    }
}
