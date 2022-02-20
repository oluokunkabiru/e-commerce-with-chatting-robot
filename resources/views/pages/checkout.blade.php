@extends('layout.mainlayout')
@section('title', 'Shopping Checkout')
@section('content')
 <!-- Breadcrumb Section Begin -->
 <section class="breadcrumb-section set-bg" data-setbg="{{ asset('asset/img/breadcrumb.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Checkout</h2>
                    <div class="breadcrumb__option">
                        <a href="/">Home</a>
                        <span>Checkout</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Checkout Section Begin -->
@if (Cart::count()>0)
<section class="checkout spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h6><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click here</a> to enter your code
                </h6>
            </div>
        </div>

        @if($errors->any())

            <div class="alert alert-danger alert-dismissible fade show">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong style="font-size:20px;">Oops!
                   {{ "Kindly rectify below errors" }}</strong><br/>
              @foreach ($errors->all() as $error)
              {{$error }} <br/>
              @endforeach
            </div>
            @endif

        @if(session('fail'))
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Success!</strong> {{ session('fail') }}
        </div>
        @endif
        @if(session('success'))
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Success!</strong> {{ session('success') }}
        </div>
        @endif

        <div class="checkout__form">
            <h4>Billing Details</h4>
            <form action="{{ route('Checkout.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="checkout__input">
                                    <p>Names<span>*</span></p>
                                    <input type="text" value="{{ Auth::user()->name }}" name="name">
                                </div>
                            </div>

                        </div>
                        <div class="checkout__input">
                            <p>Country<span>*</span></p>
                            <input type="text" name="country" value="{{ Auth::user()->country }}">
                        </div>
                        <div class="checkout__input">
                            <p>Address<span>*</span></p>
                            <input type="text" placeholder="Street Address" name="address" value="{{ Auth::user()->address }}" class="checkout__input__add">
                            <input type="text" placeholder="Apartment, suite, unite ect (optinal)" name="address1">
                        </div>
                        <div class="checkout__input">
                            <p>Town/City<span>*</span></p>
                            <input type="text" name="city" placeholder="City/Town" value="{{ Auth::user()->city }}">
                        </div>
                        <div class="checkout__input">
                            <p>Country/State<span>*</span></p>
                            <input type="text" name="state" value="{{ Auth::user()->state }}">
                        </div>
                        <div class="checkout__input">
                            <p>Postcode / ZIP<span>*</span></p>
                            <input type="text" name="zipcode" value="{{ Auth::user()->zipcode }}">
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Phone<span>*</span></p>
                                    <input type="tel" name="phone" value="{{ Auth::user()->phone }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Email<span>*</span></p>
                                    <input type="email" name="email" value="{{ Auth::user()->email }}">
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="checkout__order">
                            <h4>Your Order</h4>
                            <div class="checkout__order__products">

                                <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                        <th>Products</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (Cart::content() as $item)
                                        <tr>
                                            <td>{{ $item->model->product_name }}</td>
                                            <td>{{ $item->qty }}</td>
                                            <td><i class="fa">&#8358;</i> {{ $item->price}}</td>
                                            <td><i class="fa">&#8358;</i> {{ $item->price*$item->qty}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>

                                </table>

                            <div class="checkout__order__subtotal">Subtotal <span><i class="fa">&#8358;</i>{{ Cart::subtotal() }}</span></div>
                            {{-- <div class="checkout__order__subtotal">Tax <span><i class="fa">&#8358;</i>{{ Cart::tax() }}</span></div> --}}
                            <div class="checkout__order__total">Total <span><i class="fa">&#8358;</i>{{ Cart::subtotal() }}</span></div>

                            <div class="checkout__input__checkbox">
                                <label for="acc-or">
                                    <h3 class="text-center font-weight-bold">Payment Method</h3>
                                    {{--  <input type="checkbox" id="acc-or">
                                    <span class="checkmark"></span>  --}}
                                </label>
                            </div>
                            <p>Select your payment method below</p>
                            <div class="checkout__input__checkbox">
                                <label for="credit">
                                    Flutterwave
                                    <input type="checkbox" id="credit" value="flutterwave" class="payment_method" name="payment_method">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="checkout__input__checkbox">
                                <label for="paystack">
                                    Paystack
                                    <input type="checkbox" id="paystack" value="Paystack" class="payment_method" name="payment_method">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="checkout__input__checkbox">
                                <label for="cash">
                                    Cash
                                    <input type="checkbox" value="Cash" id="cash" class="payment_method" name="payment_method">
                                    <span class="checkmark"></span>
                                </label>
                            </div>

                            <button type="submit" class="site-btn">PLACE ORDER</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</section>
@else
<div class="jumbotron m-5 p-5">
    <h3>Dear <strong> {{ Auth::user()->name }}</strong>,
        You don't have any product on your cart. Please go and <a href="{{ route('shop') }}">shopping</a></h3>

</div>
@endif
<!-- Checkout Section End -->

@endsection
@section('script')
<script>

$(".payment_method").change(function() {
$(".payment_method").prop('checked', false);
    $(this).prop('checked', true);
});


$(".chb").change(function() {
    $(".chb").not(this).prop('checked', false);
});

</script>
@endsection
