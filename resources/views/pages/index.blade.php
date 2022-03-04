@extends('layout.homelayout')
@section('title', 'Home')

@section('content')
    <!-- Categories Section Begin -->

@php
    
@endphp
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">

                    @foreach ($category as $product)
                        @php
                            $picture = $product->picture ? $product->picture->file : '';
                            $categorys = $product->category ? $product->category->category : '';
                        @endphp
                        <div class="col-lg-3">
                            <div class="categories__item set-bg" data-setbg="{{ url($picture) }}">
                                <h5><a href="{{ route('produtCategory', ['id' => $categorys]) }}">{{ $categorys }}</a>
                                </h5>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
    </section>
    <!-- Categories Section End -->
    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Featured Product</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="*">All</li>
                            @foreach ($category as $product)
                                @php
                                    $categorys = $product->category ? $product->category->category : '';
                                @endphp
                                <li data-filter=".{{ $categorys }}">{{ $categorys }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                @foreach ($products as $product)
                    @php
                        $picture = $product->picture ? $product->picture->file : '';
                        $categorys = $product->category ? $product->category->category : '';
                    @endphp
                    <div class="col-lg-3 col-md-4 col-sm-6 mix {{ $categorys }} fresh-meat">


                            <div class="featured__item">
                                <div class="featured__item__pic set-bg" data-setbg="{{ url($picture) }}">
                                    <ul class="featured__item__pic__hover">
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
                                <div class="featured__item__text">
                                    <h6><a href="{{ route('productDetails', ['id' => $product->slug]) }}">{{ ucwords($product->product_name) }}</a></h6>
                                    <h5><span class="fa">&#8358;</span>{{ number_format($product->newprice , 2, '.', ',') }}</h5>
                                    <h5 class="text-muted"> <del><span class="fa">&#8358;</span>{{ number_format($product->oldprice , 2, '.', ',') }}</del>

                                    </h5>

                                    <small>Store: <a href="{{ route('store', $product->user->username) }}">{{ ucwords($product->user->name) }}</a> </small>
                                </div>
                            </div>

                            {{--  <div class="product__item__text">
                                <h4><a href="{{ route('productDetails', ['id' => $product->slug]) }}"
                                        class="text-dark font-weight-bold">{{ ucwords($product->product_name) }}</a></h4>



                                        <div class="card-">

                                    <div class="card-header">
                                        <h4><span class="fa">&#8358;</span>{{ $product->newprice }}</h4>
                                        <br>
                                        <form action="{{ route('AddtoCart.store') }}" method="post"
                                            style="display: inline">
                                            <input type="hidden" name="id" value="{{ $product->id }}">
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-sm btn-rounded btn-primary"> Order now <i
                                                    class="fa fa-shopping-cart"></i></button>
                                        </form>
                                        <button type="submit" class="btn btn-sm btn-rounded btn-success">Order now <i  class="fa fa-shopping-cart"></i></button>
                                        <span class="ml-4 fa">&#8358;<del>{{ $product->oldprice }}</del></span>
                                        <span class="btn btn-sm btn-rounded btn-success negotiate"
                                            name="{{ ucwords($product->product_name) }}"
                                            productid="{{ $product->id }}" oldprice="{{ $product->oldprice }}"
                                            newprice="{{ $product->newprice }}"
                                            slug="{{ route('productDetails', ['id' => $product->slug]) }}"
                                            img="{{ url($picture) }}">Negotiate</span>

                                    </div>
                                    <div class="card-body text-left">
                                        <p>Owner : <b>{{ ucwords($product->user->name) }}</b></p>
                                        <p>Contact : <b>{{ $product->user->phone }}</b></p>
                                        <p>Location : <b>{{ ucwords($product->location) }}</b></p>
                                    </div>
                                </div>

                            </div>
                        </div>--}}
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- Featured Section End -->

    <!-- Banner Begin -->
    {{-- <div class="banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <img src="{{ asset('asset/img/banner/banner1.jpg') }}" alt="allter">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <img src="{{ asset('asset/img/banner/banner2.jpg') }}" alt="allore">
                </div>
            </div>
        </div>
    </div>
</div> --}}
    <!-- Banner End -->

    <!-- Latest Product Section Begin -->
    <section class="latest-product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Latest Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                @for ($i = 0; $i < 3; $i++)
                                    @if (isset($latest[$i]->product_name))


                                        <a href="{{ route('productDetails', ['id' => $latest[$i]->slug]) }}"
                                            class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="{{ asset($latest[$i]->picture->file) }}" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>{{ $latest[$i]->product_name }}</h6>
                                                <span> <i
                                                        class="fa">&#8358;</i>{{ $latest[$i]->newprice }}</span>
                                            </div>
                                        </a>
                                    @endif
                                @endfor
                            </div>

                            <div class="latest-prdouct__slider__item">
                                @for ($i = 3; $i < 6; $i++)
                                    @if (isset($latest[$i]->product_name))


                                        <a href="{{ route('productDetails', ['id' => $latest[$i]->slug]) }}"
                                            class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="{{ asset($latest[$i]->picture->file) }}" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>{{ $latest[$i]->product_name }}</h6>
                                                <span> <i
                                                        class="fa">&#8358;</i>{{ $latest[$i]->newprice }}</span>
                                            </div>
                                        </a>
                                    @endif
                                @endfor

                            </div>

                            <div class="latest-prdouct__slider__item">
                                @for ($i = 6; $i < 9; $i++)
                                    @if (isset($latest[$i]->product_name))


                                        <a href="{{ route('productDetails', ['id' => $latest[$i]->slug]) }}"
                                            class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="{{ asset($latest[$i]->picture->file) }}" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>{{ $latest[$i]->product_name }}</h6>
                                                <span> <i
                                                        class="fa">&#8358;</i>{{ $latest[$i]->newprice }}</span>
                                            </div>
                                        </a>
                                    @endif
                                @endfor

                            </div>

                            <div class="latest-prdouct__slider__item">
                                @for ($i = 9; $i < 12; $i++)
                                    @if (isset($latest[$i]->product_name))


                                        <a href="{{ route('productDetails', ['id' => $latest[$i]->slug]) }}"
                                            class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="{{ asset($latest[$i]->picture->file) }}" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>{{ $latest[$i]->product_name }}</h6>
                                                <span> <i
                                                        class="fa">&#8358;</i>{{ $latest[$i]->newprice }}</span>
                                            </div>
                                        </a>
                                    @endif
                                @endfor

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Top Rated Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                @for ($i = 0; $i < 3; $i++)
                                    @if (isset($latestrated[$i]->product_name))


                                        <a href="{{ route('productDetails', ['id' => $latestrated[$i]->slug]) }}"
                                            class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="{{ asset($latestrated[$i]->picture->file) }}" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>{{ $latestrated[$i]->product_name }}</h6>
                                                <span> <i
                                                        class="fa">&#8358;</i>{{ $latestrated[$i]->newprice }}</span>
                                            </div>
                                        </a>
                                    @endif
                                @endfor

                            </div>
                            <div class="latest-prdouct__slider__item">
                                @for ($i = 3; $i < 6; $i++)
                                    @if (isset($latestrated[$i]->product_name))


                                        <a href="{{ route('productDetails', ['id' => $latestrated[$i]->slug]) }}"
                                            class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="{{ asset($latestrated[$i]->picture->file) }}" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>{{ $latestrated[$i]->product_name }}</h6>
                                                <span> <i
                                                        class="fa">&#8358;</i>{{ $latestrated[$i]->newprice }}</span>
                                            </div>
                                        </a>
                                    @endif
                                @endfor


                            </div>

                            <div class="latest-prdouct__slider__item">
                                @for ($i = 6; $i < 9; $i++)
                                    @if (isset($latestrated[$i]->product_name))


                                        <a href="{{ route('productDetails', ['id' => $latestrated[$i]->slug]) }}"
                                            class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="{{ asset($latestrated[$i]->picture->file) }}" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>{{ $latestrated[$i]->product_name }}</h6>
                                                <span> <i
                                                        class="fa">&#8358;</i>{{ $latestrated[$i]->newprice }}</span>
                                            </div>
                                        </a>
                                    @endif
                                @endfor


                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Review Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                @for ($i = 0; $i < 3; $i++)
                                    @if (isset($latestreview[$i]->product_name))


                                        <a href="{{ route('productDetails', ['id' => $latestreview[$i]->slug]) }}"
                                            class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="{{ asset($latestreview[$i]->picture->file) }}" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>{{ $latestreview[$i]->product_name }}</h6>
                                                <span> <i
                                                        class="fa">&#8358;</i>{{ $latestreview[$i]->newprice }}</span>
                                            </div>
                                        </a>
                                    @endif
                                @endfor


                            </div>
                            <div class="latest-prdouct__slider__item">
                                @for ($i = 3; $i < 6; $i++)
                                    @if (isset($latestreview[$i]->product_name))


                                        <a href="{{ route('productDetails', ['id' => $latestreview[$i]->slug]) }}"
                                            class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="{{ asset($latestreview[$i]->picture->file) }}" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>{{ $latestreview[$i]->product_name }}</h6>
                                                <span> <i
                                                        class="fa">&#8358;</i>{{ $latestreview[$i]->newprice }}</span>
                                            </div>
                                        </a>
                                    @endif
                                @endfor


                            </div>

                            <div class="latest-prdouct__slider__item">
                                @for ($i = 6; $i < 9; $i++)
                                    @if (isset($latestreview[$i]->product_name))


                                        <a href="{{ route('productDetails', ['id' => $latestreview[$i]->slug]) }}"
                                            class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="{{ asset($latestreview[$i]->picture->file) }}" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>{{ $latestreview[$i]->product_name }}</h6>
                                                <span> <i
                                                        class="fa">&#8358;</i>{{ $latestreview[$i]->newprice }}</span>
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
    </section>
    <!-- Latest Product Section End -->

    <!-- Blog Section Begin -->
    {{-- <section class="from-blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title from-blog__title">
                    <h2>From The Blog</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="blog__item">
                    <div class="blog__item__pic">
                        <img src="{{ asset('asset/img/blog/blog-1.jpg') }}" alt="">
                    </div>
                    <div class="blog__item__text">
                        <ul>
                            <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                            <li><i class="fa fa-comment-o"></i> 5</li>
                        </ul>
                        <h5><a href="#">Your access to food without stress</a></h5>
                        <p> Buy now and pay with ease   </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="blog__item">
                    <div class="blog__item__pic">
                        <img src="{{ asset('asset/img/blog/blog-2.jpg') }}" alt="">
                    </div>
                    <div class="blog__item__text">
                        <ul>
                            <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                            <li><i class="fa fa-comment-o"></i> 5</li>
                        </ul>
                        <h5><a href="#">Plan your event with accurate food planner</a></h5>
                        <p>Buy now at your convenience </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="blog__item">
                    <div class="blog__item__pic">
                        <img src="{{ asset('asset/img/blog/blog-3.jpg') }}" alt="">
                    </div>
                    <div class="blog__item__text">
                        <ul>
                            <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                            <li><i class="fa fa-comment-o"></i> 5</li>
                        </ul>
                        <h5><a href="#">Loan Facility</a></h5>
                        <p>Buy and pay later </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
    <!-- Blog Section End -->



@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.negotiate', function() {
                var name = $(this).attr("name");
                var productid = $(this).attr("productid");
                var oldprice = $(this).attr("oldprice");
                var newprice = $(this).attr("newprice");
                var slug = $(this).attr("slug");
                var img = $(this).attr("img");
                // console.log(name)
                // botmanChatWidget.open()
                // botmanChatWidget.say(name)
                var msg = "negotiateme," + productid;
                botmanChatWidget.whisper(msg)



            })
        })
    </script>
    {{-- <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script> --}}

@endsection
