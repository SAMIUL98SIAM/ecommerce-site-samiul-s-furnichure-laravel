<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customer Invoice</title>
    <style title="text/css">
        .mytable{
            padding: 10px;
        }
    </style>
</head>
<body>
    <center>
        <table class="mytable" width="900px" border="1">
            <tr style="text-align: center;">
                <td width="30%"><img src="{{!empty($logo->image)?url('/scripts/public/upload/logo_image/'.$logo->image):url('/upload/no_image.jpg/')}}" alt="IMG-LOGO"></td>
                <td width="40%">
                    <h4><strong>Furnish Furniture</h4></strong>
                    <span><strong>Mobile No: </strong> {{$contact->mobile_no}}</span><br/>
                    <span><strong>Email:</strong> {{$contact->email}}</span><br/>
                    <span><strong>Address: </strong>{{$contact->address}}</span><br/>
                </td>
                <td width="30%"><strong>Order No: #</strong> {{$order->order_no}}</td>
            </tr>
            <tr style="text-align: center;">
                <td><strong>Billing Info:</strong></td>
                <td colspan="2" style="text-align: left;">
                    <strong>Name: </strong> {{$order->shipping->name}} &nbsp;&nbsp;&nbsp;&nbsp;
                    <strong>Mobile no: </strong> {{$order->shipping->mobile_no}} &nbsp;&nbsp;&nbsp;&nbsp;<br/>
                    <strong>Email: </strong> {{$order->shipping->email}} &nbsp;&nbsp;&nbsp;&nbsp;
                    <strong>Address: </strong> {{$order->shipping->address}} &nbsp;&nbsp;&nbsp;&nbsp;<br/>
                    <strong>Payment: </strong>
                    {{$order->payment->payment_method}}
                    @if ($order->payment->payment_method=='Bkash')
                    (Transaction no: {{$order->payment->transaction_no}})
                    @endif
                </td>
            </tr>
            <tr style="text-align: center;">
                <td colspan="3">Order Details</td>
            </tr>
            <tr style="text-align: center;">
                <td><strong>Product Name & Image</strong></td>
                <td><strong>Color & Size</strong></td>
                <td><strong>Quantity & Price</strong></td>
            </tr>
            @foreach ($order->order_details as $details)
            <tr style="text-align: center;">
                <td>
                    <img src="{{!empty($details->product->image) ? url('/scripts/public/upload/product_image/'.$details->product->image):url('/upload/no_image.jpg')}}" width="50px" height="55px"> &nbsp; {{$details->product->name}}
                </td>
                <td>
                    {{$details->color->name}} &nbsp; & &nbsp; {{$details->size->name}}
                </td>
                <td>
                    @php
                        $sub_total = $details->quantity*$details->product->price ;
                    @endphp
                    {{$details->quantity}} X {{$details->product->price}} = {{$sub_total}}
                </td>
            </tr>
            @endforeach
            <tr style="text-align: center;">
                <td colspan="2" style="text-align: right;">GrandTotal</td>
                <td><strong>{{$order->order_total}}</strong></td>
            </tr>

        </table>
    </center>
</body>
</html>
