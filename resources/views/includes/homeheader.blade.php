
@php
$setting = App\Models\Setting::with(['picture'])
    ->where('id', 1)
    ->firstOrFail();
@endphp

<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Humberger Begin -->
<div class="humberger__menu__overlay"></div>
<div class="humberger__menu__wrapper">
    <div class="humberger__menu__logo">
        <a href="{{ route('home') }}"><img src="{{ url($setting->picture->file) }}"
                style="width: 119px; height:50px" alt="{{ $setting->company }}"></a>
        <!--<img src="" alt="">-->
    </div>
    <div class="humberger__menu__cart">
        {{-- <ul>
            <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
            <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
        </ul>
        <div class="header__cart__price">item: <span>N150.00</span></div> --}}
    </div>
    <div class="humberger__menu__widget">
        <div class="header__top__right__language">
            {{--  <img src="img/language.png" alt="">
            <div>English</div>
            <span class="arrow_carrot-down"></span>  --}}

        </div>

    </div>
    <nav class="humberger__menu__nav mobile-menu">
        <ul>
            <li class="active"><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('about') }}">About</a></li>
            <li><a href="{{ route('consultant') }}">Consultant</a></li>

            <li><a href="#">Store</a>
                <ul class="header__menu__dropdown">
                    <li><a href="{{ route('shopDetails') }}">Shop Details</a></li>
                    <li><a href="{{ route('shopingCart') }}">Shoping Cart</a></li>
                    <li><a href="{{ route('Checkout.index') }}">Check Out</a></li>
                    {{--  <li><a href="{{ route('blogDetails') }}">Update Details</a></li>  --}}
                </ul>
            </li>
            {{--  <li><a href="{{ route('blog') }}">Update</a></li>  --}}
            <li><a href="{{ route('contact') }}">Contact</a></li>
            {{--  <li><a href="{{ route('blog') }}">Update</a></li>  --}}
            <li><a href="{{ route('contact') }}">Contact</a></li>
            @guest
                <li><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
                @if (Route::has('register'))
                    <li>
                        <a href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li><a href="{{ route('dashboard') }}">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a> </li>
                @if (Auth::user()->role == 'admin')
                    <li><a href="{{ route('admin') }}">Dashboard</a></li>
                @elseif(Auth::user()->role=='marketer')
                    <li><a href="{{ route('marketer') }}">Dashboard</a></li>
                @else
                    {{ '' }}
                @endif
                <li><a href="{{ route('history') }}">History</a></li>
                <li>

                    <a class="text-center" href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            @endguest

        </ul>
    </nav>
    <div id="mobile-menu-wrap"></div>
    <div class="header__top__right__social">
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

        {{--  <a href="{{ $setting->facebook }}" target="_blank"><i class="fa fa-facebook"></i></a>
        <a href="{{ $setting->twitter }}" target="_blank"><i class="fa fa-twitter"></i></a>
        <a href="{{ $setting->linkedin }}" target="_blank"><i class="fa fa-linkedin"></i></a>
        <a href="{{ $setting->instagram }}" target="_blank"><i class="fa fa-instagram"></i></a>  --}}
    </div>
    <div class="humberger__menu__contact">
        <ul>
            <li><i class="fa fa-envelope"></i> {{ $setting->supportemail }}</li>
            <li>{{ $setting->shipping }} </li>
        </ul>
    </div>
</div>
<!-- Humberger End -->

<!-- Header Section Begin -->
<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__left">
                        <ul>
                            <li><i class="fa fa-envelope"></i> {{ $setting->supportemail }}</li>
                            <li>{{ $setting->shipping }}</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__right">
                        <div class="header__top__right__social">
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

                            {{--  <a href="{{ $setting->facebook }}" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a href="{{ $setting->twitter }}" target="_blank"><i class="fa fa-twitter"></i></a>
                            <a href="{{ $setting->linkedin }}" target="_blank"><i class="fa fa-linkedin"></i></a>
                            <a href="{{ $setting->instagram }}" target="_blank"><i class="fa fa-instagram"></i></a>  --}}
                        </div>
                        <div class="header__top__right__language">
                            {{--  <img src="img/language.png" alt="">
                            <div>English</div>
                            <span class="arrow_carrot-down"></span>
                            <ul>

                            </ul>  --}}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="header__logo">
                    <a href="home"><img src="{{ url($setting->picture->file) }}" style="width: 119px; height:50px"
                            alt="{{ $setting->company }}"></a>
                </div>
            </div>
            <div class="col-lg-9 col-md-9">
                <nav class="header__menu">
                    <ul>
                        <li class="active"><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('about') }}">About</a></li>
                        <li><a href="{{ route('consultant') }}">Consultant</a></li>

                        <li><a href="#">Store</a>
                            <ul class="header__menu__dropdown">
                                <li><a href="{{ url('/shop') }}">Shop Details</a></li>
                                <li><a href="{{ route('shopingCart') }}">Shoping Cart</a></li>
                                <li><a href="{{ route('Checkout.index') }}">Check Out</a></li>
                                {{--  <li><a href="{{ route('blogDetails') }}">Update Details</a></li>  --}}
                            </ul>
                        </li>
                        {{--  <li><a href="blog">Update</a></li>  --}}
                        <li><a href="contact">Contact</a></li>
                        @guest
                            <li><a href="login">{{ __('Login') }}</a></li>
                            @if (Route::has('register'))
                                <li>
                                    <a href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li><a href="{{ route('dashboard') }}">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                            </li>
                            @if (Auth::user()->role == 'admin')
                                <li><a href="{{ route('admin') }}">Dashboard</a></li>
                            @elseif(Auth::user()->role=='marketer')
                                <li><a href="{{ route('marketer') }}">Dashboard</a></li>
                            @else
                                {{ '' }}
                            @endif
                            <li><a href="{{ route('history') }}">History</a></li>

                            <li>
                                <a class="text-center" href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        @endguest

                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                {{-- inclde area --}}
                @include('includes.cart')
            </div>
        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>
<!-- Header Section End -->
<!-- Hero Section Begin -->
<section class="hero">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>All Category</span>
                    </div>
                    <ul>
                        @php
                            $categories = App\Models\Category::orderBy('category', 'asc')->paginate(10);
                        @endphp

                        @foreach ($categories as $category)
                            <li><a href="{{ route('produtCategory', ['id' => $category->category]) }}">
                                    {{ $category->category }} </a></li>
                        @endforeach


                    </ul>
                </div>
            </div>

            <div class="col-lg-9 col-md-9">

                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="#">
                            <div class="hero__search__categories">
                                All Categories
                                <span class="arrow_carrot-down"></span>
                            </div>
                            <input type="text" placeholder="What do yo u need?">
                            <button type="submit" class="site-btn">SEARCH</button>
                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            {{-- <h5>+2347032446095</h5> --}}
                            <h5>{{ $setting->phone }}</h5>
                            <span>support 24/7 time</span>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div id="demo" class="carousel slide" data-ride="carousel">
                        @if ($services)


                        <div class="carousel-inner">
                          <div class="carousel-item active">
                            <img src="{{ asset($services[0]->picture->file) }}" alt="{{ $services[0]->title }}</">
                            <div class="carousel-caption capdata ">
                                <h3 class="text-white font-weight-bold">{{ $services[0]->title }}</h3>
                                <p class="text-light  font-weight-bold">{{ $services[0]->description }} </p>
                                <p><a href="{{ route('services-details', $services[0]->slug?$services[0]->slug:1) }}"> <button class="btn btn-primary">Read More  <span class="icon"><i class="fa fa-angle-double-right"></i></span> </button></a></p>
                                </strong></h4>
                              </div>
                          </div>
                          @foreach ( $services as $item )
                          <div class="carousel-item">
                            <img src="{{ asset($item->picture->file) }}" alt="{{ $item->title }}">
                            <div class="carousel-caption capdata ">
                                <h3 class="text-white font-weight-bold">{{ $item->title }}</h3>
                                <p class="text-light  font-weight-bold">{{ $item->description }} </p>
                                <p><a href="{{ route('services-details', $item->slug?$item->slug:1) }}"> <button class="btn btn-primary">Read More  <span class="icon"><i class="fa fa-angle-double-right"></i></span> </button></a></p>
                                </strong></h4>
                              </div>
                          </div>
                          @endforeach

                        </div>
                        @endif
                        <a class="carousel-control-prev" href="#demo" data-slide="prev">
                          <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a class="carousel-control-next" href="#demo" data-slide="next">
                          <span class="carousel-control-next-icon"></span>
                        </a>
                      </div>

                </div>

                {{--  <div id="address-map-container" style="width:100%;height:400px; ">
                    <div style="width: 100%; height: 100%" id="map"></div>
                </div>  --}}


            </div>
        </div>
    </div>

</section>
<!-- Hero Section End -->
