<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Logo;
use App\Models\User;
use App\Models\About;
use App\Models\Category;
use App\Models\Slider;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductSize;
use App\Models\ProductSubImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        $data['user'] = Auth::user();
        return view('frontend.layouts.master.customer-dashboard',$data);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function customerEditProfile()
    {
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        $data['editData'] = User::find(Auth::user()->id);
        return view('frontend.layouts.master.customer-edit-profile',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function customerUpdateProfile(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $this->validate($request,[
            'name'=>'required',
            'email'=> 'required|unique:users,email,'.$user->id,
            'mobile'=>['required','unique:users,mobile,'.$user->id,'regex:/(^(\+8801|8801|01|008801))[1|5-9]{1}(\d){8}$/'],
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->address = $request->address;
        $user->gender = $request->gender;
        if($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('upload/user_image'.$user->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_image'),$filename);
            $user['image'] = $filename;
        }
        $user->save();
        return redirect()->route('frontend.dashboard')->with('success','Profile updated successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function customerPasswordChange()
    {
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        $data['editData'] = User::find(Auth::user()->id);
        return view('frontend.layouts.master.customer-password-change',$data);
    }

    public function customerPasswordUpdate(Request $request)
    {
        if(Auth::attempt(['id'=>Auth::user()->id,'password'=>$request->current_password])){
            $user = User::find(Auth::user()->id);
            $user->password = bcrypt($request->new_password);
            $user->save();
            return redirect()->route('frontend.dashboard')->with('success','Password Changed Successfully');
        }
        else
        {
          return redirect()->back()->with('error','Sorry!! Your password does not match');
        }
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
