@extends('frontend.layouts.master')
@section('content')
    <!-- Title page -->
    <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{asset('/frontend/images/bg-01.jpg')}}');">
        <h2 class="ltext-105 cl0 txt-center">
            Customer Billing Information
        </h2>
    </section>
    <!-- Title page/ -->

    <!-- Content page -->
    <section class="about-us">
        <div class="container">
            <div class="row" style="padding:20px 0px 20px 0px;">
                <div class="col-md-12">
                    <form method="POST" id="myForm" action="{{route('frontend.customer.checkout_store')}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <lebel>Full Name</lebel>
                                <input type="text" name="name" class="form-control">
                                <font style="color: red">{{($errors->has('name'))?($errors->first('name')):''}}</font>
                            </div>
                            <div class="col-md-6">
                                <lebel>Email</lebel>
                                <input type="email" name="email" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <lebel>Mobile</lebel>
                                <input type="text" name="mobile_no" class="form-control">
                                <font style="color: red">{{($errors->has('mobile_no'))?($errors->first('mobile_no')):''}}</font>
                            </div>
                            <div class="col-md-6">
                                <lebel>Address</lebel>
                                <input type="text" name="address" class="form-control">
                                <font style="color: red">{{($errors->has('address'))?($errors->first('address')):''}}</font>
                            </div>
                            <div class="col-md-4" style="padding-top: 30px;">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Content page/ -->
@endsection
@section('scripts')
<script>
    $(function () {
      $('#myForm').validate({
        rules: {
         mobile_no: {
              required: true,
          },
          name: {
              required: true,
          },
          address: {
            required: true,
          }
        },
        messages: {
          mobile_no: {
            required: "Please enter a mobile number",
          },
          name: {
            required: "Please enter a full name",
          },
          address: {
            required: "Please enter a address",
          }
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
