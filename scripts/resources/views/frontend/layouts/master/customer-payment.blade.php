@extends('frontend.layouts.master')
@section('styles')
<style type="text/css">
    .sss{
       float: left;
    }
    .s888{
        height: 40px;
        border: 1px solid #e6e6e6;
    }
</style>
@endsection
@section('content')
    <!-- Title page -->
    <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{asset('/frontend/images/bg-01.jpg')}}');">
        <h2 class="ltext-105 cl0 txt-center">
            Payment Method
        </h2>
    </section>
    <!-- Title page/ -->

    <!-- Shoping Cart -->
    <div class="bg0 p-t-75 p-b-85">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-xl-12" style="padding-bottom: 30px;">
                    <div class="wrap-table-shopping-cart">
                        <table class="table table-bordered">
                            <tr class="table_head">
                                <th>Product</th>
                                <th>Image</th>
                                <th>Size</th>
                                <th>Color</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                            @php
                                $contents = Cart::content();
                                $total = '0';
                            @endphp
                            @foreach ($contents as $content)
                            <tr class="table_row">
                                <td>{{$content->name}}</td>
                                <td>
                                    <div>
                                        <img src="{{asset('/scripts/public/upload/product_image/'.$content->options->image)}}" style="width: 90px;height:90px;border:1px solid #000;" alt="IMG">
                                    </div>
                                </td>
                                <td>{{$content->options->size_name}}</td>
                                <td>{{$content->options->color_name}}</td>
                                <td>{{$content->price}} TK</td>
                                <td style="width: 200px;min-width:200px;" >
                                    <form action="{{route('frontend.cart.update')}}" method="POST">
                                    @csrf
                                        <div>
                                            <input class="mtext-104 cl3 txt-center num-product form-control sss" id="qty" type="number" name="qty" value="{{$content->qty}}">
                                            <input type="hidden" name="rowId" id="rowId" value="{{$content->rowId}}">
                                            <input type="submit" value="update" class="flex-c-m stext-101 cl2 bg8 s888 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
                                        </div>
                                    </form>
                                </td>
                                <td>{{$content->subtotal}}</td>
                                <td>
                                    <a class="btn btn-danger" href="{{route('frontend.cart.delete',$content->rowId)}}"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                            @php
                                $total+= $content->subtotal ;
                            @endphp
                            @endforeach
                            <tr>
                                <td colspan="6" style="text-align: right;"><strong>Grand Total</strong></td>
                                <td colspan="2">{{$total}} TK</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <h3>Select Payment method</h3>
                </div>
                <div class="col-md-4">
                    @if (Session::get('message'))
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>{{Session::get('message')}}</strong>
                    </div>
                    @endif
                    <form method="POST" id="myForm" action="{{route('frontend.customerPaymentStore')}}">
                    @csrf
                    @foreach ($contents as $content)
                    <input type="hidden" name="product_id" value="{{$content->id}}">
                    @endforeach
                        <input type="hidden" name="order_total" value="{{$total}}">
                        <select name="payment_method" id="payment_method" class="form-control">
                            <option value="">Select Payment type</option>
                            <option value="Hand Cash">Hand Cash</option>
                            <option value="Bkash">Bkash</option>
                        </select>
                        <font style="color: red">{{($errors->has('payment_method'))?($errors->first('payment_method')):''}}</font>
                        <div class="show_field" style="display: none;">
                            <span>Bkash no is:01992569682</span>
                            <input type="text" name="transaction_no" class="form-control" placeholder="Write Transaction no">
                        </div>
                        <button type="submit" class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Shoping Cart/ -->
@endsection

@section('scripts')
<script>
    $(document).on('change','#payment_method',function(){
        var payment_method = $(this).val();
        if(payment_method == 'Bkash')
        {
            $('.show_field').show();
        }
        else
        {
            $('.show_field').hide();
        }
    });
</script>
<script>
    $(function () {
      $('#myForm').validate({
        rules: {
         payment_method: {
              required: true,
          },

        },
        messages: {
          payment_method: {
            required: "Please select payment method",
          },

        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });
    });
</script>
@endsection
