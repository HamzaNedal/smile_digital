  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('admin.home') }}" class="nav-link">الرئيسية</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <form action="{{ route('logout') }}" method="post">
          @csrf
          <button type="submit" class="btn btn-danger pull-right">تسجيل خروج</button>
        </form>
      </li>
    </ul>



    <!-- Right navbar links -->
    <ul class="navbar-nav mr-auto-navbav">
      <!-- Messages Dropdown Menu -->
     
 
      <li class="nav-item">
        <a href="{{ route('home') }}">
          {{-- <i class="fas fa-th-large"></i> --}}
         الذهاب للموقع
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->