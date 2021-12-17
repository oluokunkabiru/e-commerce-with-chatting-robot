@extends('layout.mainlayout')
@section('title', 'Category Details')
@section('content')
<!-- Featured Section Begin -->
<section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Product Category :: {{ $category}}</h2>
                    </div>

                    @php
                        $categoryid = App\Models\Category::where('category',$category)->firstOrfail();
                        $products = App\Models\Product::with(['picture', 'category'])->where('category_id',$categoryid->id)->paginate(10);

                    @endphp
                </div>
            </div>



            <div class="row featured__filter">
                 @foreach ($products as $product)
                 @php
                    $picture= $product->picture ? $product->picture->file :"";
                    $categorys = $product->category ? $product->category->category:"";
                 @endphp



                <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="{{ url($picture) }}">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="{{ route('AddtoCart.store')}}"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h4><a href="{{ route('productDetails' , ['id' => $product->slug]) }}" class="text-dark font-weight-bold">{{ $product->product_name }}</a></h4>
                            <div class="card-">
                                {{-- <div class="card-header"><h4><span class="fa">&#8358;</span>{{ $product->newprice }}<span class="ml-4 fa">&#8358;<del>{{ $product->oldprice }}</del></span></h4></div> --}}
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
                                    {{-- <button type="submit" class="btn btn-sm btn-rounded btn-success">Order now <i  class="fa fa-shopping-cart"></i></button> --}}
                                    {{-- <span class="ml-4 fa">&#8358;<del>{{ $product->oldprice }}</del></span> --}}
                                    <span class="btn btn-sm btn-rounded btn-success negotiate"
                                        name="{{ ucwords($product->product_name) }}"
                                        productid="{{ $product->id }}" oldprice="{{ $product->oldprice }}"
                                        newprice="{{ $product->newprice }}"
                                        slug="{{ route('productDetails', ['id' => $product->slug]) }}"
                                        img="{{ url($picture) }}">Negotiate</span>

                                </div>
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
    </section>
    <!-- Featured Section End -->
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
