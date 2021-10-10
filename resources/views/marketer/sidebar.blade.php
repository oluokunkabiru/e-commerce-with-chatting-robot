@php
        $setting = App\Models\Setting::with(['picture'])->where('id', 1)->firstOrFail();

@endphp
 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
      <img src="{{ asset($setting->picture->file) }}" alt="{{ $setting->company }}" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Oluokun</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ url(Auth::user()->picture->file) }}" class="img-circle elevation-2" alt="{{ Auth::user()->name }}">
        </div>
        <div class="info">
          <a href="{{ route('marketer') }}" class="d-block">{{ Auth::User() ? Auth::User()->name: "Name not available" }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column text-light" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="{{ route('marketer') }}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard | Marketer
                {{--  <i class="right fas fa-angle-left"></i>  --}}
              </p>
            </a>
          </li>
          @if (Auth::user()->status != "free")


          <li class="nav-item">
            <a href="{{ route('marketerProduct') }}" class="nav-link">
        <i class=" nav-icon fas fa-shopping-basket"></i>
              <p>
                Product

              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('marketerAllOrders') }}" class="nav-link">
              <i class="nav-icon fas fa-shopping-basket"></i>
              <p>
               Orders
              </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('marketerBuyers') }}" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
               Buyers
              </p>
            </a>
        </li>
          <!----//staff----->
            <!-----Brand----->

          </li>
          @else
          <li class="nav-item">
            <a href="#">
              <p class="text-danger">
               Pending Account
              </p>
            </a>
        </li>
          @endif

           <li class="nav-item">
            <a href="{{ route('logout') }}"
            onclick="event.preventDefault();
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
