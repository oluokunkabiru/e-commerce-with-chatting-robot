@extends('layout.mainlayout')
@section('title', 'How to  become a vendor')
@section('style')

<style>
    #about-us p{
        color: red !important;
    }
</style>
@endsection

@section('content')
 <!-- Blog Details Hero Begin -->
 @php
        $setting = App\Models\Setting::with(['picture'])->where('id', 1)->firstOrFail();

@endphp
 <section class="blog-details-hero set-bg" data-setbg="{{ url($setting->picture->file) }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="blog__details__hero__text">
                    <h2>How to become a vendor</h2>
                    {{--  <ul>
                        <li>By Michael Scofield</li>
                        <li>January 14, 2019</li>
                        <li>8 Comments</li>
                    </ul>  --}}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Details Hero End -->

<!-- Blog Details Section Begin -->
<section class="blog-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-3 order-md-1 order-2">
                <div class="blog__sidebar">
                    <div class="blog__sidebar__search">
                        <form action="#">
                            <input type="text" placeholder="Search...">
                            <button type="submit"><span class="icon_search"></span></button>
                        </form>
                    </div>
                    <div class="blog__sidebar__item">
                        <h4>More</h4>
                        <ul>
                            @foreach ($vendors as $item)
                            <li><a href="{{ route('become-a-vendor') }}#{{  str_replace(" ", "_", $item->topic) }}">{{ $item->topic }}</a></li>
                            @endforeach

                        </ul>
                    </div>

                </div>
            </div>
            <div class="col-lg-10 col-md-9 order-md-1 order-1 p-3" style="background-color: #7fad39; border-radius:5%;">
                <div class="blog__details__text">
                    {{--  <img src="{{ asset('asset/img/blog/details/details-pic.jpg') }}" alt="">  --}}
                    @foreach ($vendors as $item)


                    <div id="{{  str_replace(" ", "_", $item->topic) }}" class="text-white" style="color: white ! important">
                        <h3 class="text-center my-2 p-3 font-weight-bold text-white">{{ $item->topic }}</h3>

                        {!! $item->description !!}

                    </div>
                @endforeach

                </div>
                <div class="blog__details__content" style="color: white">
                    <div class="row" >
                        <div class="col-lg-6">
                            <div class="blog__details__author">
                                <div class="blog__details__author__pic">
                                    <img src="{{ asset('asset/img/blog/details/details-author.jpg') }}" alt="">
                                </div>
                                <div class="blog__details__author__text">
                                    <h6  style="color: white">Oluokun Kabiru</h6>
                                    <span style="color: white">Admin</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="blog__details__widget">
                                <ul>
                                    <li style="color: white">Address: {{ $setting->address }}</li>
                                <li style="color: white">Phone: {{ $setting->phone }}</li>
                                <li style="color: white">Email:{{ $setting->supportemail }}</li>
                    </ul>
                                <div class="blog__details__social" >
                                    @if ($setting->facebook)
                                    <a href="{{ $setting->facebook }}"  style="color: white" target="_blank"><i class="fa fa-facebook"></i></a>

                                    @endif
                                    @if ($setting->telegram)
                                    <a href="{{ $setting->telegram }}"  style="color: white" target="_blank"><i class="fa fa-telegram"></i></a>

                                    @endif


                                    @if ($setting->twitter)
                                    <a href="{{ $setting->twitter }}" style="color: white" target="_blank"><i class="fa fa-twitter"></i></a>

                                    @endif

                                    @if ($setting->linkedin)
                                    <a href="{{ $setting->linkedin }}" style="color: white" target="_blank"><i class="fa fa-linkedin"></i></a>

                                    @endif

                                    @if ($setting->instagram)
                                    <a href="{{ $setting->instagram }}" style="color: white" target="_blank"><i class="fa fa-instagram"></i></a>

                                    @endif

                                    @if ($setting->whatsapp)
                                    <a href="{{ $setting->whatsapp }}" style="color: white" target="_blank"><i class="fa fa-whatsapp"></i></a>

                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Details Section End -->

<!-- Related Blog Section Begin -->
{{--  <section class="related-blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title related-blog-title">
                    <h2>Post You May Like</h2>
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
                        <h5><a href="#">Cooking tips make cooking simple</a></h5>
                        <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
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
                        <h5><a href="#">6 ways to prepare breakfast for 30</a></h5>
                        <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
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
                        <h5><a href="#">Visit the clean farm in the US</a></h5>
                        <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>  --}}
<!-- Related Blog Section End -->

@endsection
