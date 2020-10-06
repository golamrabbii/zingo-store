<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="user-wrapper">
                
              </div>
              {{-- <button class="btn btn-success btn-block">New Project
                <i class="mdi mdi-plus"></i>
              </button> --}}
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/admin') }}">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#product" aria-expanded="false" aria-controls="product">
              <i class="menu-icon mdi mdi-content-copy"></i>
              <span class="menu-title">Products</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="product">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('/add_product') }}">Add product</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('/manage_product') }}">Manage product</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#customer" aria-expanded="false" aria-controls="customer">
              <i class="menu-icon mdi mdi-content-copy"></i>
              <span class="menu-title">Customers</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="customer">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('/add_customer') }}">Add customer</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('/customer') }}">Show customer</a>
                </li>
              </ul>
            </div>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#invoice" aria-expanded="false" aria-controls="invoice">
              <i class="menu-icon mdi mdi-content-copy"></i>
              <span class="menu-title">Invoice</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="invoice">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="pages/ui-features/buttons.html">Create invoice</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="pages/ui-features/typography.html">Show invoice</a>
                </li>
              </ul>
            </div>
          </li> -->
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/orders') }}">
              <i class="menu-icon mdi mdi-backup-restore"></i>
              <span class="menu-title">Orders</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/categories') }}">
              <i class="menu-icon mdi mdi-backup-restore"></i>
              <span class="menu-title">Categories</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/brands') }}">
              <i class="menu-icon mdi mdi-chart-line"></i>
              <span class="menu-title">Brands</span>
            </a>
          </li>
           <li class="nav-item">
            <a class="nav-link" href="{{ url('/admin/settings') }}">
              <i class="menu-icon mdi mdi-account-settings"></i>
              <span class="menu-title">Settings</span>
            </a>
          </li>
           {{-- <li class="nav-item">
            <a class="nav-link" href="{{ url('/districts') }}">
              <i class="menu-icon mdi mdi-sticker"></i>
              <span class="menu-title">Districts</span>
            </a>
          </li>  --}}
        </ul>
      </nav>