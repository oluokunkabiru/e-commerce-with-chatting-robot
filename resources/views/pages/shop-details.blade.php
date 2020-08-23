@extends('layout.mainlayout')
@section('title', 'Shop Details')
@section('content')

    <!-- Breadcrumb Section Begin -->

    @if ($products)


    @foreach ($products as $product )
        @php
            $picture= $product->picture ? $product->picture->file :"";
            $categorys = $product->category ? $product->category->category:"";
        @endphp

    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('asset/img/breadcrumb.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>{{ $product->product_name }}</h2>
                        <div class="breadcrumb__option">
                            <a href="/">Home</a>
                            <a href="{{ route('produtCategory',['id' => $categorys]) }}"> {{ $categorys }}</a>
                            <span>{{ $product->product_name }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large"
                                src="{{ asset($picture) }}" alt="">
                        </div>
                        <div class="product__details__pic__slider owl-carousel">
                            @foreach ($related as $product )
                                    @php
                                        $picture= $product->picture ? $product->picture->file :"";
                                        $categorys = $product->category ? $product->category->category:"";
                                    @endphp
 {{-- route('productDetails' , ['id' => $product->slug]) --}}

                            <img data-imgbigurl="{{asset($picture) }}"
                                src="{{ asset($picture) }}" alt="">
                             @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3>{{ $product->product_name }}</h3>
                        <div class="product__details__rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <span>(18 reviews)</span>
                        </div>
                        <div class="product__details__price"><span class="fa">&#8358;</span>{{ $product->newprice }}</div>
                        <p>
                                {{ $product->description }}
                        </p>
                        <div class="product__details__quantity">
                            <div class="quantity">
                                <div class="pro-qty">
                                    <input type="text" value="1" id="upCart" name="quantity">

                                </div>
                            </div>
                        </div>
                        <form action="{{ route('AddtoCart.store')}}" method="post">
                            <input type="hidden" name="id" value="{{ $product->id }}">
                            {{ csrf_field() }}
                        <button type="submit" class="primary-btn">ADD TO CARD</button>
                        </form>
                        <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                        <ul>
                            <li><b>Availability</b> <span>{{ $product->quantity }}</span></li>
                            <li><b>Contact Phone</b><span>{{ $product->user->phone }}</span></li>
                            <li><b>Marketer Name</b><span>{{ $product->user->name }}</span></li>
                            <li><b>Location </b><span>{{ucwords($product->location) }}</span></li>
                            <li><b>Shipping</b> <span>01 day shipping. <samp>Free pickup today</samp></span></li>

                            <li><b>Share on</b>
                                <div class="share">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

    <!-- Related Product Section Begin -->
    <section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>Related Product</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($related as $product )
                    @php
                        $picture= $product->picture ? $product->picture->file :"";
                        $categorys = $product->category ? $product->category->category:"";
                    @endphp

                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="{{ asset($picture) }}">
                            <ul class="product__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li>
                                    <form action="{{ route('AddtoCart.store')}}" method="post">
                                        <input type="hidden" name="id" value="{{ $product->id }}">
                                        {{ csrf_field() }}

                                    <button type="submit"><i class="fa fa-shopping-cart"></i></button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                                <h6><a href="{{ route('productDetails' , ['id' => $product->slug]) }}">{{ $product->product_name }}</a></h6>
                                <div class="card-">
                                    <div class="card-header"><h4><span class="fa">&#8358;</span>{{ $product->newprice }}<span class="ml-4 fa">&#8358;<del>{{ $product->oldprice }}</del></span></h4></div>
                                    <div class="card-body text-left">
                                        <p>Owner : <b>{{ucwords($product->user->name) }}</b></p>
                                        <p>Contact : <b>{{ $product->user->phone }}</b></p>
                                        <p>Location : <b>{{ ucwords($product->location) }}</b></p>
                                    </div>
                                </div>

                        </div>
                    </div>
                </div>
                 @endforeach

            </div>
        </div>
    </section>
    <!-- Related Product Section End -->
    @endforeach
    @else
    <h1>No Data</h1>
    @endif

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
            //$('#updateDiv').html(response);

            }
    });
    }
    });
})

</script>
@endsection
