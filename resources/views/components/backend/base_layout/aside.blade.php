  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      {{-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8"> --}}
      <span class="brand-text font-weight-light">Smile Digital</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          {{-- <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> --}}
        </div>
        <div class="info">
          <a href="#" class="d-block" style="text-transform: capitalize">{{ auth()->user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fab fa-servicestack"></i>
              <p>
                الخدمات
                <i class="fas fa-angle-left right"></i>
                {{-- <span class="badge badge-info right">6</span> --}}
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.service.index') }}" class="nav-link">
                  <i class="fab fa-servicestack nav-icon"></i>
                  <p>عرض الخدمات</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.category.index') }}" class="nav-link">
                  <i class="fab fa-servicestack nav-icon"></i>
                  <p>الاقسام</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fab fa-servicestack"></i>
              <p>
                الإنجازات
                <i class="fas fa-angle-left right"></i>
                {{-- <span class="badge badge-info right">6</span> --}}
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.achievement.index') }}" class="nav-link">
                  <i class="fab fa-servicestack nav-icon"></i>
                  <p>عرض الإنجازات</p>
                </a>
              </li>
            </ul>            
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fab fa-servicestack"></i>
              <p>
                الشهادات
                <i class="fas fa-angle-left right"></i>
                {{-- <span class="badge badge-info right">6</span> --}}
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.testimon.index') }}" class="nav-link">
                  <i class="fab fa-servicestack nav-icon"></i>
                  <p>عرض الشهادات</p>
                </a>
              </li>
            </ul>            
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fab fa-servicestack"></i>
              <p>
                العملاء
                <i class="fas fa-angle-left right"></i>
                {{-- <span class="badge badge-info right">6</span> --}}
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.client.index') }}" class="nav-link">
                  <i class="fab fa-servicestack nav-icon"></i>
                  <p>عرض العملاء</p>
                </a>
              </li>
            </ul>            
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fab fa-servicestack"></i>
              <p>
               الاعدادات
                <i class="fas fa-angle-left right"></i>
                {{-- <span class="badge badge-info right">6</span> --}}
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.static_page.index') }}" class="nav-link">
                  <i class="fab fa-servicestack nav-icon"></i>
                  <p> الاعدادات الاساسية</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.contactUs.index') }}" class="nav-link">
                  <i class="fab fa-servicestack nav-icon"></i>
                  <p>تواصل معنا</p>
                </a>
              </li>
            </ul>    
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.about_us.show') }}" class="nav-link">
                  <i class="fab fa-servicestack nav-icon"></i>
                  <p>من نحن</p>
                </a>
              </li>
            </ul>         
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>