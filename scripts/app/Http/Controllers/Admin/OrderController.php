<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Shipping;
use App\Models\Payment;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function  pendingList()
    {
        $data['orders'] = Order::where('status','0')->get();
        return view('admin.order.pending-list',$data);
    }

    public function  approvedList()
    {
        $data['orders'] = Order::where('status','1')->get();
        return view('admin.order.approved-list',$data);
    }

    public function details($id)
    {
        $data['order'] = Order::find($id);

        return view('admin.order.order-details',$data);
    }

    public function approve(Request $request,$id)
    {
        $order = Order::find($request->id);
        $order->status = 1 ;
        $order->save();
        return redirect()->route('orders.approved.list')->with('success','Order has been approved');
    }
}
