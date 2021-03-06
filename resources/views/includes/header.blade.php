  <!-- Page Preloder -->
  <div id="preloder">
    <div class="loader"></div>
</div>

<!-- Humberger Begin -->
<div class="humberger__menu__overlay"></div>
<div class="humberger__menu__wrapper">
    <div class="humberger__menu__logo">
        <a href="#"><img src="img/logo.png" alt=""></a>
    </div>
    <div class="humberger__menu__cart">
        <ul>
            <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
            <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
        </ul>
        <div class="header__cart__price">item: <span>
            {{-- @if(Cart::instance('default')->count()>0)
            {{ Cart::instance('default')->count() }}</span>
            @endif --}}
        </span></div>
    </div>
    <div class="humberger__menu__widget">
        <div class="header__top__right__language">
            <img src="img/language.png" alt="">
            <div>English</div>
            <span class="arrow_carrot-down"></span>
            <ul>
                <li><a href="#">Spanis</a></li>
                <li><a href="#">English</a></li>
            </ul>
        </div>

    </div>
    <nav class="humberger__menu__nav mobile-menu">
        <ul>
            <li class="active"><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('shop') }}">Shop</a></li>
            <li><a href="#">Pages</a>
                <ul class="header__menu__dropdown">
                    <li><a href="{{ url('/shop') }}">Shop Details</a></li>
                    <li><a href="{{ route('shopingCart') }}">Shoping Cart</a></li>
                    <li><a href="{{ route('checkout') }}">Check Out</a></li>
                    <li><a href="{{ route('blogDetails') }}">Update Details</a></li>
                </ul>
            </li>
            <li><a href="{{ route('blog') }}">Update</a></li>
            <li><a href="{{ route('contact') }}">Contact</a></li>
            <li><a href="{{ route('blog') }}">Update</a></li>
                        <li><a href="{{ route('contact') }}">Contact</a></li>
                        @guest
                        <li><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
                      @if (Route::has('register'))
                      <li>
                           <a href="{{ route('register') }}">{{ __('Register') }}</a>
                     </li>
                       @endif
                       @else
                       <li><a  href="{{ route('dashboard') }}">
                      {{ Auth::user()->name }} <span class="caret"></span>
                       </a> </li>
                       @if (Auth::user()->role=='admin')
                       <li><a href="{{ route('admin') }}">Dashboard</a></li>
                      @elseif(Auth::user()->role=='marketer')
                      <li><a href="{{ route('marketer') }}">Dashboard</a></li>
                      @else
                      <li><a href="#">History</a></li>
                      @endif
                       <li>
                          <a class="text-center" href="{{ route('logout') }}"
                          onclick="event.preventDefault();
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
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-linkedin"></i></a>
        <a href="#"><i class="fa fa-pinterest-p"></i></a>
    </div>
    <div class="humberger__menu__contact">
        <ul>
            <li><i class="fa fa-envelope"></i> support@soupe.com.ng</li>
            <li>Free Shipping for all Order</li>
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
                            <li><i class="fa fa-envelope"></i> support@soupe.com.ng</li>
                            <li>Free Shipping for all Order </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__right">
                        <div class="header__top__right__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-pinterest-p"></i></a>
                        </div>
                        <div class="header__top__right__language">
                            <img src="img/language.png" alt="">
                            <div>English</div>
                            <span class="arrow_carrot-down"></span>
                            <ul>
                                <li><a href="#">Spanis</a></li>
                                <li><a href="#">English</a></li>
                            </ul>
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
                    <a href="home"><img src="{{ asset('asset/img/logo.png') }}" alt="Logo"></a>
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="header__menu">
                    <ul>
                            <li class="active"><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="{{ route('shop') }}">Shop</a></li>
                            <li><a href="#">Pages</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="{{ url('/shop') }}">Shop Details</a></li>
                                    <li><a href="{{ route('shopingCart') }}">Shoping Cart</a></li>
                                    <li><a href="{{ route('checkout') }}">Check Out</a></li>
                                    <li><a href="{{ route('blogDetails') }}">Update Details</a></li>
                            </ul>
                        </li>
                        <li><a href="blog">Update</a></li>
                        <li><a href="contact">Contact</a></li>
                        @guest
                        <li><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
                      @if (Route::has('register'))
                      <li>
                           <a href="{{ route('register') }}">{{ __('Register') }}</a>
                     </li>
                       @endif
                       @else
                       <li><a  href="{{ route('dashboard') }}">
                      {{ Auth::user()->name }} <span class="caret"></span>
                       </a> </li>
                       @if (Auth::user()->role=='admin')
                        <li><a href="{{ route('admin') }}">Dashboard</a></li>
                       @elseif(Auth::user()->role=='marketer')
                       <li><a href="{{ route('marketer') }}">Dashboard</a></li>
                       @else
                       <li><a href="#">History</a></li>
                       @endif
                       <li>
                          <a class="text-center" href="{{ route('logout') }}"
                          onclick="event.preventDefault();
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
            </div>
            <div class="col-lg-3">
                <div class="header__cart">
                    <ul>
                        <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                        <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
                    </ul>
                    <div class="header__cart__price">item: <span>N150.00</span></div>
                </div>
            </div>
        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>
<!-- Header Section End -->
<!-- Hero Section Begin -->
<section class="hero  hero-normal">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>All departments</span>
                    </div>
                    <ul>
                            <ul>
                                    @php
                                    $categories= App\Category::paginate(10);
                                    @endphp

                                    @foreach ( $categories as $category )
                                        <li><a href="{{ route('produtCategory',['id' => $category->category]) }}"> {{ $category->category }} </a></li>
                                    @endforeach


                                </ul>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
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
                            <h5>+2347032446095</h5>
                            <span>support 24/7 time</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->
