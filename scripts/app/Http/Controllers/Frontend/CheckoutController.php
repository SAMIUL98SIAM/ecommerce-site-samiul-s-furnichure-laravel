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
use Cart;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
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

    // public function email_send(Request $request)
    // {
    //     $contact = new Communicate();
    //     $contact->name = $request->name;
    //     $contact->mobile = $request->mobile;
    //     $contact->email = $request->email;
    //     $contact->msg = $request->msg;
    //     $contact->save();

    //     $data = array(
    //         'name'=>$request->fname,
    //         'mobile'=>$request->mobile,
    //         'email'=>$request->email,
    //         'msg'=>$request->msg
    //     );
    //     Mail::send('frontend.emails.contact',$data,function($messages) use($data){
    //         $messages->from('samiulsiam59@gmail.com','Orbitech Bd');
    //         $messages->to($data['email']);
    //         $messages->from($data['email'],'Orbitech Bd');
    //         // $messages->subject('Thanks for contact us');
    //         // $messages->from($data['email'],'Orbitech Bd');
    //         // $messages->to('samiulsiam59@gmail.com');
    //         $messages->subject('Thanks for contact us');
    //     });


    //     return redirect()->back()->with('success','Your message successfully sends');
    // }

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
