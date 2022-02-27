@extends('layout.mainlayout')
@section('title', 'Services: ', $slider->title)
@section('content')
 <!-- Blog Details Hero Begin -->
 @php
        $setting = App\Models\Setting::with(['picture'])->where('id', 1)->firstOrFail();

@endphp
 <section class="blog-details-hero set-bg" data-setbg="{{ url($slider->picture->file) }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="blog__details__hero__text">
                    <h2>{{ $slider->title }}</h2>
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
            <div class="col-lg-4 col-md-5 order-md-1 order-2">
                <div class="blog__sidebar">
                    <div class="blog__sidebar__search">
                        <form action="#">
                            <input type="text" placeholder="Search...">
                            <button type="submit"><span class="icon_search"></span></button>
                        </form>
                    </div>
                    <div class="blog__sidebar__item">
                        <h4>About Us</h4>
                        <ul>
                            <li><a href="{{ route('about') }}#mission">Our Mission</a></li>
                            <li><a href="{{ route('about') }}#vision">Our Vision</a></li>
                            <li><a href="{{ route('about') }}#services">Our Services</a></li>
                            <li><a href="{{ route('consult-us') }}">Consult Us</a></li>
                            <li><a href="{{ route('contact') }}">Contact Us</a></li>
                        </ul>
                    </div>

                </div>
            </div>
            <div class="col-lg-8 col-md-7 order-md-1 order-1">
                <div class="blog__details__text">
                    <img src="{{ url($slider->picture->file)}}" alt="">
                    <div id="about-us">
                        {{--  <h3 class="text-center my-2">{{ $slider->t }}</h3>  --}}
                        {!! $slider->description !!}

                    </div>

                </div>
                <div class="blog__details__content">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="blog__details__author">
                                <div class="blog__details__author__pic">
                                    <img src="{{ asset('asset/img/blog/details/details-author.jpg') }}" alt="">
                                </div>
                                <div class="blog__details__author__text">
                                    <h6>Oluokun Kabiru</h6>
                                    <span>Admin</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="blog__details__widget">
                                <ul>
                                    <li>Address: {{ $setting->address }}</li>
                                <li>Phone: {{ $setting->phone }}</li>
                                <li>Email:{{ $setting->supportemail }}</li>
                    </ul>
                                <div class="blog__details__social">
                                    @if ($setting->facebook)
                                    <a href="{{ $setting->facebook }}" target="_blank"><i class="fa fa-facebook"></i></a>

                                    @endif
                                    @if ($setting->telegram)
                                    <a href="{{ $setting->telegram }}" target="_blank"><i class="fa fa-telegram"></i></a>

                                    @endif


                                    @if ($setting->twitter)
                                    <a href="{{ $setting->twitter }}" target="_blank"><i class="fa fa-twitter"></i></a>

                                    @endif

                                    @if ($setting->linkedin)
                                    <a href="{{ $setting->linkedin }}" target="_blank"><i class="fa fa-linkedin"></i></a>

                                    @endif

                                    @if ($setting->instagram)
                                    <a href="{{ $setting->instagram }}" target="_blank"><i class="fa fa-instagram"></i></a>

                                    @endif

                                    @if ($setting->whatsapp)
                                    <a href="{{ $setting->whatsapp }}" target="_blank"><i class="fa fa-whatsapp"></i></a>

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
