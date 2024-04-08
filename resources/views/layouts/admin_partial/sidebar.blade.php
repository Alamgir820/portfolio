
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('public/backend') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AH</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('public/images') }}/{{ $about->image }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open active">
            <a href="{{ route('admin.home') }}" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt text-info"></i>
              <p>
                Dashboard
              </p>
            </a>
           
          </li>
          <li class="nav-item">
            <a href="{{ route('home.edit') }}" class="nav-link">
              <i class="nav-icon fas fa-home-user"></i>
              <p>
                Home 
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('about.edit') }}" class="nav-link">
              <i class="nav-icon fa-regular fa-address-card"></i>
              <p>
                About 
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('skill.index') }}" class="nav-link">
              <i class="nav-icon fa-solid fa fa-book"></i>
              <p>
                Skills 
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="{{ route('services.index') }}" class="nav-link">
              <i class="nav-icon fa-brands fa-servicestack"></i>
              <p>
                Services 
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('works.index') }}" class="nav-link">
              <i class="nav-icon fa-brands fa-servicestack"></i>
              <p>
                Works 
              </p>
            </a>
          </li>
         

         
          
          <li class="nav-item">
            <a href="{{ route('footer.index') }}" class="nav-link">
              <i class="nav-icon fa-brands fa-servicestack"></i>
              <p>
                Footer 
              </p>
            </a>
          </li>
        
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Blogs
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('blog.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon text-info"></i>
                  <p>Blog</p>
                </a>
              </li>
             
            </ul>

          </li>



          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Setting
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('mail.edit') }}" class="nav-link">
                  <i class="far fa-circle nav-icon text-danger"></i>
                  <p>Mail setting</p>
                </a>
              </li>
             
            </ul>

          </li>


          <li class="nav-header">LABELS</li>
          <li class="nav-item">
            <a href="{{ route('admin.logout') }}"  id="logout" class="nav-link delete">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p class="text">Log Out</p>
            </a>
          </li>
          
         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>