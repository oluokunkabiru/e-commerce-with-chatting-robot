@extends('layout.mainlayout')
@section('title', 'Shop Cart')
@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('asset/img/breadcrumb.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Shopping Cart</h2>
                        <div class="breadcrumb__option">
                            <a href="/">Home</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->

    <section class="shoping-cart spad">
        @if(Cart::count() >0)
        <div class="container">
        <h4 class="text-center mt-3 mb-5">Your Shopping Cart contains <span class="font-weight-bold">{{ Cart::count() }}</span> items</h4>
        @if($errors->any())
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Oops!</strong>
            @foreach ($errors as $error )
            {{ $error }}
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

        <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="mr-3">S/N</th>
                                    <th class="shoping__product">Products</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i=1;
                                @endphp
                                @foreach (Cart::content() as $item)


                                <tr>
                                    <td>{{ $i }}</td>
                                    <td class="shoping__cart__item">
                                        <img src="{{ url($item->model->picture->file) }}" alt="{{ $item->model->product_name }}" style="width: 120px">
                                        <h5>{{ ucwords($item->name) }}</h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                        <i class="fa">&#8358;</i> {{ $item->price}}
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="number" name="quantity" id="upCart"  value="{{ $item->qty }}" max="{{ $item->model->quantity }}" min="1">
                                                <input type="hidden" id="rowId"  value="{{ $item->rowId }}" style="max-width:80px;">
                                                <input type="hidden"  id="proId" value="{{ $item->model->id }}" style="max-width:80px;">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="shoping__cart__total">
                                        <i class="fa">&#8358;</i> {{ $item->price *$item->qty }}
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        <form action="{{route('AddtoCart.destroy', $item->rowId )}}" method="post" id="delete-form{{$item->rowId}}" style="display:none">
                                            @csrf
                                             @method('DELETE')
                                        </form>
                                       <button onclick="if(confirm('Are you sure you want to delete this product?')){
                                       event.defaultPrevented;
                                       document.getElementById('delete-form{{$item->rowId}}').submit();
                                       } else{
                                           event.defaultPrevented;
                                       }" class="btn btn-danger btn-sm" ><span class="icon_close"></span></button>


                                    </td>
                                </tr>
                                @php
                                    $i++;
                                @endphp
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="{{ route('shop') }}" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                        <a href="{{ route('clearCart') }}" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                            Clear Cart
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>Discount Codes</h5>
                            <form action="#">
                                <input type="text" placeholder="Enter your coupon code">
                                <button type="submit" class="site-btn">APPLY COUPON</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Total Amount <span><i class="fa">&#8358;</i> {{ Cart::subtotal() }}</span></li>
                            {{-- <li>Total <span>$454.98</span></li> --}}
                        </ul>
                        <a href="{{ route('Checkout.index') }}" class="primary-btn">PROCEED TO CHECKOUT</a>
                    </div>
                </div>
            </div>
        </div>


        @else
            <h3 class="text-center font-weight-bold">You dont Have any product on Cart</h3>

        @endif
    </section>

    <!-- Shoping Cart Section End -->
@endsection
@section('script')
<script>
$(document).ready(function(){

var proQty = $('.pro-qty');
    proQty.prepend('<span class="dec qtybtn">-</span>');
    proQty.append('<span class="inc qtybtn">+</span>');
    proQty.on('click', '.qtybtn', function () {
        var $button = $(this);
        var oldValue = $button.parent().find('#upCart').val();
        // alert(oldValue)
        if ($button.hasClass('inc')) {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        $button.parent().find('#upCart').val(newVal);
        var rowId = $button.parent().find('#rowId').val();
        var proId = $button.parent().find('#proId').val();

        // alert('quantity = ' + newVal + '\n Row Id = ' + rowId + '\n Pro Id' + proId);
        if(newVal <= 0){alert('Please enter valid number')}
        else{
        $.ajax({
            url:"{{ url('/AddtoCart') }}/"+rowId,
            type: "PUT",
            headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
            dataType:"html",
            data: "qty=" + newVal + "& rowId=" + rowId + "& proId=" + proId,
            success:function(response){
        //    console.log(response);
                window.location.href = "{{ route('AddtoCart.index')  }}";
            // $('#updateDiv').html(response);

            }
    });
    }
    });
})

</script>

@endsection
