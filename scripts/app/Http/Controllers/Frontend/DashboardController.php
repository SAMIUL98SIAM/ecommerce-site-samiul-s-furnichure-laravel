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
use App\Models\Shipping;
use App\Models\Payment;
use App\Models\Order;
use App\Models\OrderDetail;
use Cart;
use Illuminate\Support\Facades\Session;
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
    public function payment()
    {
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();

        return view('frontend.layouts.master.customer-payment',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function paymentStore(Request $request)
    {
        if ($request->product_id == NULL) {
            return redirect()->back()->with('message','Please add any product');
        }
        else
        {
            $this->validate($request,[
                'payment_method'=>'required',
            ]);
            if($request->payment_method  == 'Bkash' && $request->transaction_no==NULL)
            {
                return redirect()->back()->with('message','Please enter your transaction number');
            }
            Db::transaction(function() use($request){
                $payment = new Payment();
                $payment->payment_method = $request->payment_method ;
                $payment->transaction_no = $request->transaction_no ;
                $payment->save();

                $order = new Order();
                $order->user_id = Auth::user()->id;
                $order->shipping_id = Session::get('shipping_id');
                $order->payment_id = $payment->id ;
                $order_data = Order::orderBy('id','desc')->first();
                if ($order_data == null) {
                   $first_reg  = 0;
                   $order_no = $first_reg+1;
                }
                else
                {
                    $order_data = Order::orderBy('id','desc')->first()->order_no;
                    $order_no = $order_data+1;
                }
                $order->order_no = $order_no ;
                $order->order_total = $request->order_total ;
                $order->status = 0;
                $order->save();

                $contents  = Cart::content();

                foreach ($contents as $key => $content) {
                    $order_details = new OrderDetail();
                    $order_details->order_id = $order->id ;
                    $order_details->product_id = $content->id ;
                    $order_details->color_id = $content->options->color_id ;
                    $order_details->size_id = $content->options->size_id ;
                    $order_details->quantity = $content->qty;
                    $order_details->save();
                }

            });
        }
        Cart::destroy();
            return redirect()->route('frontend.customerOrderList')->with('success','You successfully completed your order');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function customerOrderList()
    {
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        $data['orders'] = Order::where('user_id',Auth::user()->id)->get();
        return view('frontend.layouts.master.customer-order',$data);
    }

    public function customerOrderDetails($id)
    {
        $orderData = Order::find($id);
        $data['order'] = Order::where('id',$orderData->id)->where('user_id',Auth::user()->id)->first();
        if($data['order']==false)
        {
            return redirect()->back()->with('error','Do not try to be oversmart');
        }
        else
        {
            $data['logo'] = Logo::first();
            $data['contact'] = Contact::first();
            $data['order'] = Order::with(['order_details'])->where('id',$orderData->id)->where('user_id',Auth::user()->id)->first();
            return view('frontend.layouts.master.customer-order-details',$data);
        }



    }
}
