@extends('layout.mainlayout')
@section('title', 'Shop Grid')
@section('content')

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{ asset('asset/img/breadcrumb.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Soupe Shop</h2>
                    <div class="breadcrumb__option">
                        <a href="{{ route('home') }}">Home</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-5">
                <div class="sidebar">
                    <div class="sidebar__item">
                        <h4>Department</h4>
                        <ul>
                                @php
                                $categories= App\Models\Category::paginate(10);
                                @endphp

                                @foreach ( $categories as $category )
                                    <li><a href="{{ route('produtCategory',['id' => $category->category]) }}"> {{ $category->category }} </a></li>
                                @endforeach
                        </ul>
                    </div>
                    <div class="sidebar__item">
                        <h4>Price</h4>
                        <div class="price-range-wrap">
                            <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                data-min="{{ $minprice+0 }}" data-max="{{ 0+$maxprice }}">
                                <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                            </div>
                            <div class="range-slider">
                                <div class="price-input">
                                    <input type="text" id="minamount">
                                    <input type="text"  id="maxamount">
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--  <div class="sidebar__item sidebar__item__color--option">
                        <h4>Colors</h4>
                        <div class="sidebar__item__color sidebar__item__color--white">
                            <label for="white">
                                White
                                <input type="radio" id="white">
                            </label>
                        </div>
                        <div class="sidebar__item__color sidebar__item__color--gray">
                            <label for="gray">
                                Gray
                                <input type="radio" id="gray">
                            </label>
                        </div>
                        <div class="sidebar__item__color sidebar__item__color--red">
                            <label for="red">
                                Red
                                <input type="radio" id="red">
                            </label>
                        </div>
                        <div class="sidebar__item__color sidebar__item__color--black">
                            <label for="black">
                                Black
                                <input type="radio" id="black">
                            </label>
                        </div>
                        <div class="sidebar__item__color sidebar__item__color--blue">
                            <label for="blue">
                                Blue
                                <input type="radio" id="blue">
                            </label>
                        </div>
                        <div class="sidebar__item__color sidebar__item__color--green">
                            <label for="green">
                                Green
                                <input type="radio" id="green">
                            </label>
                        </div>
                    </div>  --}}
                    <div class="sidebar__item">
                        <h4>Popular Category</h4>
                       @foreach ($categor as $category)


                        <div class="sidebar__item__size">
                            <label for="large">
                                {{ $category->category }}
                                <input type="radio" id="large">
                            </label>
                        </div>
                        @endforeach
                        {{--  <div class="sidebar__item__size">
                            <label for="medium">
                                Medium
                                <input type="radio" id="medium">
                            </label>
                        </div>
                        <div class="sidebar__item__size">
                            <label for="small">
                                Small
                                <input type="radio" id="small">
                            </label>
                        </div>
                        <div class="sidebar__item__size">
                            <label for="tiny">
                                Tiny
                                <input type="radio" id="tiny">
                            </label>
                        </div>  --}}
                    </div>
                    <div class="sidebar__item">
                        <div class="latest-product__text">
                            <h4>Latest Products</h4>
                            <div class="latest-product__slider owl-carousel">
                                <div class="latest-prdouct__slider__item">
                                    @for ($i =0 ; $i <3 ; $i++)
                                    @if (isset($latest[$i]->product_name))


                                    <a href="{{ route('productDetails' , ['id' => $latest[$i]->slug]) }}" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{ asset( $latest[$i]->picture->file) }}" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>{{  $latest[$i]->product_name }}</h6>
                                           <span> <i class="fa">&#8358;</i>{{ $latest[$i]->newprice }}</span>
                                        </div>
                                    </a>
                                    @endif
                                    @endfor
                                </div>

                                <div class="latest-prdouct__slider__item">
                                    @for ($i =3 ; $i <6 ; $i++)
                                    @if (isset($latest[$i]->product_name))


                                    <a href="{{ route('productDetails' , ['id' => $latest[$i]->slug]) }}" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{ asset( $latest[$i]->picture->file) }}" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>{{  $latest[$i]->product_name }}</h6>
                                           <span> <i class="fa">&#8358;</i>{{ $latest[$i]->newprice }}</span>
                                        </div>
                                    </a>
                                    @endif
                                    @endfor

                                </div>

                                <div class="latest-prdouct__slider__item">
                                    @for ($i =6 ; $i <9 ; $i++)
                                    @if (isset($latest[$i]->product_name))


                                    <a href="{{ route('productDetails' , ['id' => $latest[$i]->slug]) }}" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{ asset( $latest[$i]->picture->file) }}" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>{{  $latest[$i]->product_name }}</h6>
                                           <span> <i class="fa">&#8358;</i>{{ $latest[$i]->newprice }}</span>
                                        </div>
                                    </a>
                                    @endif
                                    @endfor

                                </div>

                                <div class="latest-prdouct__slider__item">
                                    @for ($i =9 ; $i <12 ; $i++)
                                    @if (isset($latest[$i]->product_name))


                                    <a href="{{ route('productDetails' , ['id' => $latest[$i]->slug]) }}" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{ asset( $latest[$i]->picture->file) }}" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>{{  $latest[$i]->product_name }}</h6>
                                           <span> <i class="fa">&#8358;</i>{{ $latest[$i]->newprice }}</span>
                                        </div>
                                    </a>
                                    @endif
                                    @endfor

                                </div>
                            </div>

                        </div>
                    </div>


                    <div class="sidebar__item">
                        <div class="latest-product__text">
                            <h4>Review Products</h4>
                            <div class="latest-product__slider owl-carousel">
                                <div class="latest-prdouct__slider__item">
                                    @for ($i =0 ; $i <3 ; $i++)
                                    @if (isset($latestreview[$i]->product_name))


                                    <a href="{{ route('productDetails' , ['id' => $latestreview[$i]->slug]) }}" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{ asset( $latestreview[$i]->picture->file) }}" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>{{  $latestreview[$i]->product_name }}</h6>
                                           <span> <i class="fa">&#8358;</i>{{ $latestreview[$i]->newprice }}</span>
                                        </div>
                                    </a>
                                    @endif
                                    @endfor


                                </div>
                                <div class="latest-prdouct__slider__item">
                                    @for ($i =3 ; $i <6 ; $i++)
                                    @if (isset($latestreview[$i]->product_name))


                                    <a href="{{ route('productDetails' , ['id' => $latestreview[$i]->slug]) }}" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{ asset( $latestreview[$i]->picture->file) }}" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>{{  $latestreview[$i]->product_name }}</h6>
                                           <span> <i class="fa">&#8358;</i>{{ $latestreview[$i]->newprice }}</span>
                                        </div>
                                    </a>
                                    @endif
                                    @endfor


                                </div>

                                <div class="latest-prdouct__slider__item">
                                    @for ($i =6 ; $i <9 ; $i++)
                                    @if (isset($latestreview[$i]->product_name))


                                    <a href="{{ route('productDetails' , ['id' => $latestreview[$i]->slug]) }}" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{ asset( $latestreview[$i]->picture->file) }}" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>{{  $latestreview[$i]->product_name }}</h6>
                                           <span> <i class="fa">&#8358;</i>{{ $latestreview[$i]->newprice }}</span>
                                        </div>
                                    </a>
                                    @endif
                                    @endfor


                                </div>

                            </div>

                        </div>
                    </div>





                    <div class="sidebar__item">
                        <div class="latest-product__text">
                            <h4>Top Rated Products</h4>
                            <div class="latest-product__slider owl-carousel">
                                <div class="latest-prdouct__slider__item">
                                    @for ($i =0 ; $i <3 ; $i++)
                                    @if (isset($latestrated[$i]->product_name))


                                    <a href="{{ route('productDetails' , ['id' => $latestrated[$i]->slug]) }}" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{ asset( $latestrated[$i]->picture->file) }}" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>{{  $latestrated[$i]->product_name }}</h6>
                                           <span> <i class="fa">&#8358;</i>{{ $latestrated[$i]->newprice }}</span>
                                        </div>
                                    </a>
                                    @endif
                                    @endfor

                                </div>
                                <div class="latest-prdouct__slider__item">
                                    @for ($i =3 ; $i <6 ; $i++)
                                    @if (isset($latestrated[$i]->product_name))


                                    <a href="{{ route('productDetails' , ['id' => $latestrated[$i]->slug]) }}" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{ asset( $latestrated[$i]->picture->file) }}" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>{{  $latestrated[$i]->product_name }}</h6>
                                           <span> <i class="fa">&#8358;</i>{{ $latestrated[$i]->newprice }}</span>
                                        </div>
                                    </a>
                                    @endif
                                    @endfor


                                </div>

                                <div class="latest-prdouct__slider__item">
                                    @for ($i =6 ; $i <9 ; $i++)
                                    @if (isset($latestrated[$i]->product_name))


                                    <a href="{{ route('productDetails' , ['id' => $latestrated[$i]->slug]) }}" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{ asset( $latestrated[$i]->picture->file) }}" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>{{  $latestrated[$i]->product_name }}</h6>
                                           <span> <i class="fa">&#8358;</i>{{ $latestrated[$i]->newprice }}</span>
                                        </div>
                                    </a>
                                    @endif
                                    @endfor


                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-7">
                <div class="product__discount">
                    <div class="section-title product__discount__title">
                        <h2>Sale Off</h2>
                    </div>
                    <div class="row">
                        <div class="product__discount__slider owl-carousel">
                                @foreach ($products as $product)
                                @php
                                   $picture= $product->picture ? $product->picture->file :"";
                                   $categorys = $product->category ? $product->category->category:"";
                                @endphp

                            <div class="col-lg-4">
                                <div class="product__discount__item">
                                    <div class="product__discount__item__pic set-bg"
                                        data-setbg="{{ url($picture) }}">
                                        <div class="product__discount__percent">-20%</div>
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
                                    <div class="product__discount__item__text">
                                        <span class="font-weight-bold">{{ $categorys }}</span>
                                        <h4><a href="{{ route('productDetails' , ['id' => $product->slug]) }}" class="text-dark font-weight-bold">{{ $product->product_name }}</a></h4>
                                        <div class="product__item__price fa">&#8358;{{ $product->newprice }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
                <div class="filter__item">
                    <div class="row">
                        <div class="col-lg-4 col-md-5">
                            <div class="filter__sort">
                                <span>Sort By</span>
                                <select>
                                    <option value="0">Default</option>
                                    <option value="0">Default</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="filter__found">
                                <h6><span>16</span> Products found</h6>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-3">
                            <div class="filter__option">
                                <span class="icon_grid-2x2"></span>
                                <span class="icon_ul"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                        @foreach ($products as $product)
                        @php
                           $picture= $product->picture ? $product->picture->file :"";
                           $categorys = $product->category ? $product->category->category:"";
                        @endphp

                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{ url($picture)}}">
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
                                <h4><a href="{{ route('productDetails' , ['id' => $product->slug]) }}" class="text-dark font-weight-bold">{{ $product->product_name }}</a></h4>
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

                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{ asset('asset/img/product/product-2.jpg') }}">
                                <ul class="product__item__pic__hover">
                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6><a href="#">Crab Pool Security</a></h6>
                                <h5>N30.00</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{ asset('asset/img/product/product-3.jpg') }}">
                                <ul class="product__item__pic__hover">
                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6><a href="#">Crab Pool Security</a></h6>
                                <h5>N30.00</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{ asset('asset/img/product/product-4.jpg') }}">
                                <ul class="product__item__pic__hover">
                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6><a href="#">Crab Pool Security</a></h6>
                                <h5>N30.00</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{ asset('asset/img/product/product-5.jpg') }}">
                                <ul class="product__item__pic__hover">
                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6><a href="#">Crab Pool Security</a></h6>
                                <h5>N30.00</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{ asset('asset/img/product/product-6.jpg') }}">
                                <ul class="product__item__pic__hover">
                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6><a href="#">Crab Pool Security</a></h6>
                                <h5>N30.00</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{ asset('asset/img/product/product-7.jpg') }}">
                                <ul class="product__item__pic__hover">
                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6><a href="#">Crab Pool Security</a></h6>
                                <h5>N30.00</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{ asset('asset/img/product/product-8.jpg') }}">
                                <ul class="product__item__pic__hover">
                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6><a href="#">Crab Pool Security</a></h6>
                                <h5>N30.00</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{ asset('asset/img/product/product-9.jpg') }}">
                                <ul class="product__item__pic__hover">
                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6><a href="#">Crab Pool Security</a></h6>
                                <h5>N30.00</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{ asset('asset/img/product/product-10.jpg') }}">
                                <ul class="product__item__pic__hover">
                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6><a href="#">Crab Pool Security</a></h6>
                                <h5>N30.00</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{ asset('asset/img/product/product-11.jpg') }}">
                                <ul class="product__item__pic__hover">
                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6><a href="#">Crab Pool Security</a></h6>
                                <h5>N30.00</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{ asset('asset/img/product/product-12.jpg') }}">
                                <ul class="product__item__pic__hover">
                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6><a href="#">Crab Pool Security</a></h6>
                                <h5>N30.00</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product__pagination">
                    {{ $products->links() }}
                    {{--<a href="#">1</a>

                      <a href="#">2</a>
                    <a href="#">3</a>
                    <a href="#"><i class="fa fa-long-arrow-right"></i></a>  --}}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Section End -->



@endsection
