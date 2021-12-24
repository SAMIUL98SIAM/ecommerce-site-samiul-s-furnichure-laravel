<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Logo;
use App\Models\About;
use App\Models\Category;
use App\Models\Slider;
use App\Models\Communicate;
use App\Models\Product;
use App\Models\Size;
use App\Models\Color;
use App\Models\ProductColor;
use App\Models\ProductSize;
use App\Models\ProductSubImage;
use Cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function customerLogin()
    {
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        $data['about'] = About::first();
        return view('frontend.layouts.master.customer-login',$data);
    }

    public function customerSignup()
    {
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        $data['about'] = About::first();
        return view('frontend.layouts.master.customer-signup',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
