@php
$setting = App\Models\Setting::with(['picture'])->where('id', 1)->firstOrFail();

@endphp
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
        <img src="{{ asset($setting->picture->file) }}" alt="{{ $setting->company }}"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ ucwords($setting->company) }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ url(Auth::user()->picture->file) }}" class="img-circle elevation-2"
                    alt="{{ Auth::user()->name }}">
            </div>
            <div class="info">
                <a href="{{ route('dashboard') }}"
                    class="d-block">{{ Auth::User() ? Auth::User()->name: "Name not available" }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column text-light" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                    <a href="{{ route('admin') }}" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard | Admin
                            {{-- <i class="right fas fa-angle-left"></i>  --}}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('marketerRequest') }}" class="nav-link">
                        <i class=" nav-icon fas fa-users"></i>
                        <p>
                            Marketer Request
                            @if (count(Auth::user()->where(['role'=>'marketer', 'status'=>'free'])->get()) > 0)


                            <sup><span
                                    class="badge badge-pill badge-danger p-1"><b>{{ count(Auth::user()->where(['role'=>'marketer', 'status'=>'free'])->get()) }}</b></span></sup>
                            @endif
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-users"></i>
                      <p>
                        Users
                        <i class="fas fa-angle-left right"></i>
                        {{-- <span class="badge badge-info right">6</span> --}}
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('allusers') }}" class="nav-link">
                                <i class=" nav-icon fas fa-user"></i>
                                <p>
                                    All Users

                                </p>
                            </a>
                        </li>

                      <li class="nav-item">
                        <a href="{{ route('allmarketers') }}" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Marketers</p>
                        </a>
                      </li>

                      <li class="nav-item">
                        <a href="{{ route('allBuyers') }}" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                All Buyers
                            </p>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="{{ route('adminBuyers') }}" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                My Buyers
                            </p>
                        </a>
                    </li>



                    </ul>
                  </li>


                  <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-store"></i>
                      <p>
                        Products
                        <i class="fas fa-angle-left right"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{ route('allproduct') }}" class="nav-link">
                                <i class=" nav-icon fas fa-shopping-basket"></i>
                                <p>
                                    All Product

                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('adminproduct') }}" class="nav-link">
                                <i class=" nav-icon fas fa-shopping-basket"></i>
                                <p>
                                    My Product

                                </p>
                            </a>
                        </li>


                <li class="nav-item">
                    <a href="{{ route('pending-product') }}" class="nav-link">
                        <i class="text-danger nav-icon fas fa-shopping-basket"></i>
                        <p>
                            Pending Product
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('disabled-product') }}" class="nav-link">
                        <i class="text-warning nav-icon fas fa-shopping-basket"></i>
                        <p>
                            Disabled Product
                        </p>
                    </a>
                </li>
                    </ul>
                  </li>

                  <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-shopping-cart"></i>
                      <p>
                        Orders
                        <i class="fas fa-angle-left right"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('allOrders') }}" class="nav-link">
                                <i class="nav-icon fas fa-shopping-basket"></i>
                                <p>
                                    All Orders
                                </p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="{{ route('adminorders') }}" class="nav-link">
                                <i class="nav-icon fas fa-shopping-basket"></i>
                                <p>
                                    My Orders
                                </p>
                            </a>
                        </li>

                    </ul>
                  </li>




                  <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fas ">&#8358;</i>
                      <p>
                        Payments
                        <i class="fas fa-angle-left right"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">

                      <li class="nav-item">
                        <a href="{{ route('make-payout') }}" class="nav-link">
                          <i class="fas fa-tag nav-icon"></i>
                          <p>Make Payment</p>
                        </a>
                      </li>

                      <li class="nav-item">
                        <a href="{{ route('payout-history') }}" class="nav-link">
                          <i class="far fa-clock nav-icon"></i>
                          <p>Payment History</p>
                        </a>
                      </li>


                    </ul>
                  </li>





                <!----//staff----->
                <!-----Brand----->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-users"></i>
                      <p>
                        Extra
                        <i class="fas fa-angle-left right"></i>
                        {{-- <span class="badge badge-info right">6</span> --}}
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item has-treeview">
                            <a href="{{ route('category') }}" class="nav-link">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    Categories
                                    {{-- <i class="fas fa-angle-left right"></i> --}}
                                </p>
                            </a>
                        </li>



                        <li class="nav-item has-treeview">
                            <a href="{{ route('services.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    Services
                                    {{-- <i class="fas fa-angle-left right"></i> --}}
                                </p>
                            </a>
                        </li>

                        <li class="nav-item has-treeview">
                            <a href="{{ route('how-to-become-a-vendow.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    Become a vendor
                                    {{-- <i class="fas fa-angle-left right"></i> --}}
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- Cateegories  -->


                {{-- messages  --}}
                <li class="nav-item has-treeview">
                    <a href="{{ route('custmersMessages') }}" class="nav-link">
                        <i class="nav-icon fas fa-comments"></i>
                        <p>
                            Messages
                            @if (count(App\Models\Contact::where('status', "unread")->get()) > 0)


                            <sup><span
                                    class="badge badge-pill badge-danger p-1"><b>{{ count(App\Models\Contact::where('status', "unread")->get()) }}</b></span></sup>
                            {{-- <i class="fas fa-angle-left right"></i> --}}
                            @endif
                        </p>
                    </a>
                </li>
                <!-- Settings  -->
                <li class="nav-item has-treeview">
                    <a href="{{ route('Settings.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            Settings
                            {{-- <i class="fas fa-angle-left right"></i> --}}
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();" class="nav-link">
                        <i class="nav-icon fa fa-power-off text-danger"></i>
                        <p class="text">Sign Out</p>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
