<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Size;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\ProductSize;
use App\Models\ProductColor;
use App\Models\ProductSubImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['allData']= Product::all();
        return view('admin.product.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = Category::all();
        $data['brands'] = Brand::all();
        $data['colors'] = Color::all();
        $data['sizes'] = Size::all();
        return view('admin.product.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::transaction(function() use($request){
            $product = new Product();
            $product->category_id = $request->category_id ;
            $product->brand_id = $request->brand_id ;
            $product->name = $request->name ;
            $product->short_desc = $request->short_desc ;
            $product->long_desc = $request->long_desc ;
            $product->price = $request->price ;
            $img = $request->file('image');
            if($img){
                $imgName = date('YmdHi').$img->getClientOriginalName();
                $img->move(public_path('upload/product_image'),$imgName);
                $product['image'] = $imgName;
            }

            if ($product->save()) {

                $files = $request->sub_image;
                if(!empty($files)){
                    foreach ($files as $key => $file) {
                        $imgName = date('YmdHi').$file->getClientOriginalName();
                        $file->move(public_path('upload/product_image/product_sub_image'),$imgName);
                        $subimage['sub_image'] = $imgName;

                        $subimage = new ProductSubImage();
                        $subimage->product_id = $product->id ;
                        $subimage->sub_image = $imgName ;
                        $subimage->save();
                    }
                }

                $colors = $request->color_id ;
                if(!empty($colors)){
                    foreach ($colors as $key => $color) {
                        $mycolor = new ProductColor();
                        $mycolor->product_id = $product->id ;
                        $mycolor->color_id = $color ;
                        $mycolor->save();
                    }
                }

                $sizes = $request->size_id ;
                if(!empty($sizes)){
                    foreach ($sizes as $key => $size) {
                        $mysize = new ProductSize();
                        $mysize->product_id = $product->id ;
                        $mysize->size_id = $size ;
                        $mysize->save();
                    }
                }
            }
            else
            {
                return redirect()->back()->with('error','Sorry!! data not saved');
            }
        });
        return redirect()->route('products.view')->with('success','Product Added Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['product'] = Product::find($id);
        return view('admin.product.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['editData'] = Product::find($id);
        $data['categories'] = Category::all();
        $data['brands'] = Brand::all();
        $data['colors'] = Color::all();
        $data['sizes'] = Size::all();
        $data['color_array'] = ProductColor::select('color_id')->where('product_id',$data['editData']->id)->orderBy('id','asc')->get()->toArray();
        $data['size_array'] = ProductSize::select('size_id')->where('product_id',$data['editData']->id)->orderBy('id','asc')->get()->toArray();
        return view('admin.product.edit',$data);
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
        DB::transaction(function() use($request,$id){
            $editData = Product::find($id);
            $editData->category_id = $request->category_id ;
            $editData->brand_id = $request->brand_id ;
            $editData->name = $request->name ;
            $editData->short_desc = $request->short_desc ;
            $editData->long_desc = $request->long_desc ;
            $editData->price = $request->price ;
            $img = $request->file('image');
            if($img){
                $imgName = date('YmdHi').$img->getClientOriginalName();
                $img->move(public_path('upload/product_image'),$imgName);
                if(file_exists('/scripts/public/upload/product_image/'.$editData->image) AND !empty($editData->image))
                {
                    unlink('/scripts/public/upload/product_image/'.$editData->image);
                }
                $editData['image'] = $imgName;
            }

            if ($editData->save()) {

                $files = $request->sub_image;

                if(!empty($files))
                {
                    $subImage = ProductSubImage::where('product_id',$id)->get()->toArray();
                    foreach ($subImage as $key => $value) {
                        if(!empty($value))
                        {
                            unlink('/scripts/public/upload/product_image/product_sub_image/'.$value['sub_image']);
                        }
                    }
                    ProductSubImage::where('product_id',$id)->delete();
                }

                if(!empty($files)){
                    foreach ($files as $key => $file) {
                        $imgName = date('YmdHi').$file->getClientOriginalName();
                        $file->move(public_path('upload/product_image/product_sub_image'),$imgName);
                        $subimage['sub_image'] = $imgName;

                        $subimage = new ProductSubImage();
                        $subimage->product_id = $editData->id ;
                        $subimage->sub_image = $imgName ;
                        $subimage->save();
                    }
                }



                $colors = $request->color_id ;
                if(!empty($colors))
                {
                    ProductColor::where('product_id',$id)->delete();
                }
                if(!empty($colors)){
                    foreach ($colors as $key => $color) {
                        $mycolor = new ProductColor();
                        $mycolor->product_id = $editData->id ;
                        $mycolor->color_id = $color ;
                        $mycolor->save();
                    }
                }


                $sizes = $request->size_id ;
                if(!empty($sizes))
                {
                    ProductSize::where('product_id',$id)->delete();
                }
                if(!empty($sizes)){
                    foreach ($sizes as $key => $size) {
                        $mysize = new ProductSize();
                        $mysize->product_id = $editData->id ;
                        $mysize->size_id = $size ;
                        $mysize->save();
                    }
                }
            }
            else
            {
                return redirect()->back()->with('error','Sorry!! data not saved');
            }
        });
        return redirect()->route('products.view')->with('success','Product Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $product = Product::find($request->id);
        if(file_exists('/scripts/public/upload/product_image/'.$product->image) AND !empty($product->image))
        {
            unlink('/scripts/public/upload/product_image/'.$product->image);
        }
        $subImage = ProductSubImage::where('product_id',$product->id)->get()->toArray();
        // if(!empty($subImage))
        // {
        //     foreach ($subImage as $key => $value) {
        //         if(!empty($value))
        //         {
        //             unlink('/scripts/public/upload/product_image/product_sub_image/'.$value['sub_image']);
        //         }
        //     }
        // }

        ProductSubImage::where('product_id',$product->id)->delete();
        ProductColor::where('product_id',$product->id)->delete();
        ProductSize::where('product_id',$product->id)->delete();
        $product->delete();
        return redirect()->route('products.view')->with('error','Product has been deleted');
    }



}
