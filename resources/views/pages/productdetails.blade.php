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
                        $categoryid = App\Category::where('category',$category)->firstOrfail();
                        $products = App\Product::with(['picture', 'category'])->where('category_id',$categoryid->id)->paginate(10);

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
                        <div class="featured__item__pic set-bg" data-setbg="{{ asset($picture) }}">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="{{ route('productDetails' , ['id' => $product->slug]) }}">{{ $product->product_name }}</a></h6>
                            <h4><span style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif" class="font-weight-bold  fa">&#8358; {{ $product->newprice }}</span>   <span class="float-right mr-2 fa">&#8358; <strike>{{ $product->oldprice }}</strike></span></h4>

                        </div>
                    </div>
                </div>
                @endforeach

        </div>
    </section>
    <!-- Featured Section End -->
@endsection
