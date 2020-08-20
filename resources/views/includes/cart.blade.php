@if(session('fail'))
<div class="alert alert-danger alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Fail!</strong> {{ session('fail') }}
</div>
@endif

@if(session('success'))
            <div class="alert alert-success" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
 <span aria-hidden="true">&times;</span></button>
<strong>Success!</strong> {{ session('success') }}
</div>
@endif
<!-- //logo -->
<div class="header__cart">
    <ul>
        <li><a href="{{ route('shopingCart') }}" title="Cart">
        {{--  <i class="fas fa-cart-plus"> Cart</i> </a></li>  --}}
        @if(Cart::instance('default')->count()>0)
        <li><a href="#"><i class="fa fa-heart"></i> <span style="">1</span></a></li>
        <li><a href="{{ route('shopingCart') }}"><i class="fa fa-shopping-cart"></i>

<span>

        {{ Cart::instance('default')->count() }}
        </span></a></li>
       @endif
    </ul>
    @if(Cart::instance('default')->total() >0)
    <div class="header__cart__price ml-2">Amount: <span class="fa">&#8358;

        {{ Cart::instance('default')->subtotal() }}</span></div>
</div>
<div class="w3ls_right_nav ml-auto d-flex">
    <span style="font-size:30px;" class="badge">

    @endif
