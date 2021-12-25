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
use App\Models\User;
use App\Models\ProductSubImage;
use App\Models\Shipping;
use App\Models\Payment;
use App\Models\Order;
use App\Models\OrderDetail;
use Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function customerSignupStore(Request $request)
    {
       DB::transaction(function() use($request){
            $this->validate($request,[
                'name'=>'required',
                'email'=> 'required|unique:users,email',
                'mobile'=>['required','unique:users,mobile','regex:/(^(\+8801|8801|01|008801))[1|5-9]{1}(\d){8}$/'],
                'password'=>'min:6|required_with:confirmation_password|same:confirmation_password',
                'confirmation_password'=>'min:6',
            ]);
            $code = rand(0000,9999);
            $user = new User();
            $user->name = $request->name;
            $user->mobile = $request->mobile;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->code = $code ;
            $user->status = 0;
            $user->usertype = 'customer' ;
            $user->save();

            $data = array(
                'email'=>$request->email,
                'code'=>$code
            );
            Mail::send('frontend.emails.verify-email',$data,function($messages) use($data){
                $messages->from('samiulsiam59@gmail.com','Orbitech Bd');
                $messages->to($data['email']);
                $messages->from($data['email'],'Orbitech Bd');
                // $messages->subject('Thanks for contact us');
                // $messages->from($data['email'],'Orbitech Bd');
                // $messages->to('samiulsiam59@gmail.com');
                $messages->subject('Please your email address');
            });
       });
       return redirect()->route('frontend.customer.email_verify')->with('success','You have successfully signed up, please verify your email');

    }


    public function emailVerify()
    {
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        return view('frontend.layouts.master.email-verify',$data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function emailVerifyStore(Request $request)
    {
        $this->validate($request,[
            'email'=> 'required',
            'code'=>'required'
        ]);
        $checkData = User::where('email',$request->email)->where('code',$request->code)->first();
        if($checkData)
        {
           $checkData->status = 1 ;
           $checkData->save();
           return redirect()->route('frontend.customer.login')->with('success','You have successfully verified, please, logged in');
        }
        else
        {
            return redirect()->back()->with('error','Sorry email or verification code does not match');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function checkout()
    {
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        return view('frontend.layouts.master.customer-checkout',$data);
    }


    public function checkoutStore(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'address'=> 'required',
            'mobile_no'=>['required','regex:/(^(\+8801|8801|01|008801))[1|5-9]{1}(\d){8}$/'],

        ]);
        $checkout =  new Shipping();
        $checkout->user_id = Auth::user()->id;
        $checkout->name = $request->name ;
        $checkout->mobile_no = $request->mobile_no ;
        $checkout->email = $request->email ;
        $checkout->address = $request->address ;
        $checkout->save();
        Session::put('shipping_id',$checkout->id);
        return redirect()->route('frontend.customerPayment')->with('success','Data saved successfully');
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
