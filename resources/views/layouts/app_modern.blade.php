<!DOCTYPE html>
<html lang="en">

<head>  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $title ?? '' }}</title>
  <link rel="shortcut icon" type="image/png" href="/modern/src/assets/images/logos/ProgrammingWeb.jpg" />
  <link rel="stylesheet" href="/modern/src/assets/css/styles.min.css" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="{{ route("student.index") }}" class="text-nowrap logo-img">
            <img src="/modern/src/assets/images/logos/STD-ProWeb.jpg" width="180" alt="" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Data Siswa</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" {{ request()->is('student*') ? 'class=active' : '' }}
              href="/student" aria-expanded="false">
                <span>
                  <i class="ti ti-list"></i>
                </span>
                <span class="hide-menu">Siswa</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/student/create" aria-expanded="false">
                <span>
                  <i class="ti ti-plus"></i>
                </span>
                <span class="hide-menu">Tambah Siswa</span>
              </a>
            </li>
          </ul>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <!--  Header End -->
      <div class="container-fluid">
        @if (session()->has('pesan'))
            <div class="alert alert-info" role="alert">
                {{ session('pesan') }}
            </div>
        @endif
        @yield('content')
      </div>
    </div>
  </div>
  <script src="/modern/src/assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="/modern/src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="/modern/src/assets/js/sidebarmenu.js"></script>
  <script src="/modern/src/assets/js/app.min.js"></script>
  <script src="/modern/src/assets/libs/simplebar/dist/simplebar.js"></script>
</body>

</html>