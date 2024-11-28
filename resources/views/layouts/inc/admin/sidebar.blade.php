 <!-- Page Sidebar Start-->
 <div class="sidebar-wrapper">
    <div>
      <div class="logo-wrapper"><a href="index.html"><img class="img-fluid for-light" src="{{ asset('admin\images\logo\logo.png') }}" alt=""><img class="img-fluid for-dark" src="{{ asset('admin/logo/logo_dark.png') }}" alt=""></a>
        <div class="back-btn"><i class="fa fa-angle-left"></i></div>
        <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
      </div>
      <div class="logo-icon-wrapper"><a href="index.html"><img class="img-fluid" src="{{ asset('admin/images/logo/logo-icon.png') }}" alt=""></a></div>
      <nav class="sidebar-main">
        <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
        <div id="sidebar-menu">
          <ul class="sidebar-links" id="simple-bar">
            <li class="back-btn"><a href="index.html"><img class="img-fluid" src="{{ asset('admin/images/logo/logo-icon.png') }}" alt=""></a>
              <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
            </li>
            <li class="sidebar-main-title">
              <div>
                <h6 class="lan-1">General</h6>
                <p class="lan-2">Dashboards,widgets & layout.</p>
              </div>
            </li>
            <li class="sidebar-list">
              <a class="sidebar-link sidebar-title" href="{{ route('admin.dashboard') }}">
                  <i data-feather="home"></i><span>Dashboard</span>
              </a>
            </li>


            <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i data-feather="airplay"></i><span>Brands</span></a>
              <ul class="sidebar-submenu">
                <li><a href="general-widget.html">Add Brand</a></li>
                <li><a href="chart-widget.html">View Brand</a></li>
              </ul>
            </li>



            <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i data-feather="layout"></i><span>Category</span></a>
              <ul class="sidebar-submenu">
                <li><a href="box-layout.html">Add Category</a></li>
                <li><a href="layout-rtl.html">View Category</a></li>
              </ul>
            </li>
            
            
            <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i data-feather="airplay"></i><span>Home Silder</span></a>
              <ul class="sidebar-submenu">
                <li><a href="{{ url('admin/sliders/create' )}}">Add Silder</a></li>
                <li><a href="{{ url('admin/sliders' )}}">View Silder</a></li>
              </ul>
            </li>

          </ul>
        </div>
        <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
      </nav>
    </div>
  </div>
  <!-- Page Sidebar Ends-->