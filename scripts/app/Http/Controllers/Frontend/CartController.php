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

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function addToCart(Request $request)
    {
        $this->validate($request,[
            'size_id' => 'required',
            'color_id' => 'required'
        ]);
        // dd($request->all());
        $product = Product::where('id',$request->id)->first();
        $product_size = Size::where('id',$request->size_id)->first();
        $product_color = Color::where('id',$request->color_id)->first();
        Cart::add([
            'id'=>$product->id ,
            'qty'=>$request->qty ,
            'price'=>$product->price ,
            'name'=>$product->name,
            'weight'=>550,
            'options'=>[
                'size_id'=>$request->size_id,
                'size_name'=>$product_size->name,
                'color_id'=>$request->color_id,
                'color_name'=>$product_color->name,
                'image'=>$product->image,
            ],
        ]);
        return redirect()->route('frontend.shopping_cart')->with('success','Product added successfully');
    }

    public function shopping_cart()
    {
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        return view('frontend.layouts.master.shopping-cart',$data);
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
    public function updateToCart(Request $request)
    {
        Cart::update($request->rowId,$request->qty);
        return redirect()->route('frontend.shopping_cart')->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteCart($rowId)
    {
        Cart::remove($rowId);
        return redirect()->route('frontend.shopping_cart')->with('error','Product delted successfully');
    }
}
