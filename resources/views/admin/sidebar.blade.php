
 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">
      <img src="{{ asset('asset/img/logo.png') }}" alt="Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">SOUPE</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          {{-- <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> --}}
        </div>
        <div class="info">
          <a href="{{ route('dashboard') }}" class="d-block">{{ Auth::User() ? Auth::User()->name: "Name not available" }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column text-light" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="{{ route('dashboard') }}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard | Admin 
                <i class="right fas fa-angle-left"></i>
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
            <a href="{{ route('allproduct') }}" class="nav-link">
        <i class=" nav-icon fas fa-shopping-basket"></i>
              <p>
               All Product

              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-shopping-basket"></i>
              <p>
               Orders
              </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
               Buyers
              </p>
            </a>
        </li>
          <!----//staff----->
            <!-----Brand----->
          <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Brands
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="#" class="nav-link active">
                <i class="far fa-circle nav-icon"></i>
                <p>Add New Brand</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Manage Brand</p>
              </a>
            </li>

          </ul>
        </li>
<!----//-Brand----->
           <!-- Cateegories  -->
           <li class="nav-item has-treeview">
            <a href="{{ route('category') }}" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Categories
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

            <!--- Stock Unit -->
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                    Stock Units
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="#" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add New Stock Unit</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Manage Stock Units</p>
                  </a>
                </li>

              </ul>
            </li>
            <!-- / Stock Units -->
          </li>

           <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                    Settings
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a class="dropdown-item" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();" class="nav-link">
                       {{ __('Logout') }}
                   </a>
                   <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                       @csrf
                   </form>

                    </div>
                </li>
              </ul>
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
