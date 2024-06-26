<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Page | Admin</title>
  <link rel="shortcut icon" type="image/png" href="{{ asset('assets/sistem_informasi/logos/favicon.png')}}" />
  <link rel="stylesheet" href="{{ asset('assets/sistem_informasi/css/styles.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/font-awesome/css/font-awesome.min.css') }}">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


  <style>
    #toastBox {
position: absolute;
bottom: 30px;
right: 30px;
display: flex;
align-items: flex-end;
flex-direction: column;
overflow: hidden;
}

.toastt {
width: 300px;
color: rgb(0, 0, 0);
height: 80px;
font-weight: bold;
background: #66ff66;
font-weight: 500;
font-size: 12px;
box-shadow: 0 0 20px rgb(0, 0, 0, .6);
display: flex;
align-items: center;
}

.toastt i {
margin: 0 20px;
font-size: 35px;
color: red;
}

.toastt.errortoast i {
margin: 0 20px;
font-size: 22px;
color: red;
}

.toastt.sukses i {
margin: 0 20px;
font-size: 22px;
color: green;
}

.toastt::after {
content: '';
position: absolute;
left: 0;
bottom: 0;
width: 100%;
height: 5px;
background: red;
animation: anim 5s linear forwards;
}

@keyframes anim {
100% {
    width: 0;
}
}
</style>
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-center mt-4 font-weight-bold">
          <a href="" class="text-nowrap logo-img">
            <h3>JCN-GO</h3>
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
              <span class="hide-menu">Dasbor</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/administrator" aria-expanded="false">
                <span>
                  <i class=" fa fa-home"></i>
                </span>
                <span class="hide-menu">Dasbor</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Akun</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/admin" aria-expanded="false">
                <span>
                  <i class="fa fa-user-circle"></i>
                </span>
                <span class="hide-menu">Daftar Admin</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Instansi</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/dinas" aria-expanded="false">
                <span>
                  <i class=" fa fa-building"></i>
                </span>
                <span class="hide-menu">Kelola Instansi</span>
              </a>
            </li>

            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Rekomendasi</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/penginapan" aria-expanded="false">
                <span>
                  <i class=" fa fa-hotel"></i>
                </span>
                <span class="hide-menu">Kelola Penginapan</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/wisata" aria-expanded="false">
                <span>
                  <i class=" fa fa-plane"></i>
                </span>
                <span class="hide-menu">Kelola Wisata</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/kuliner" aria-expanded="false">
                <span>
                  <i class="fa fa-cutlery" aria-hidden="true"></i>
                </span>
                <span class="hide-menu">Kelola Kuliner</span>
              </a>
            </li>
            <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">Beranda</span>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="/" aria-expanded="false">
                  <span>
                    <i class="fa fa-arrow-left"></i>
                  </span>
                  <span class="hide-menu">Beranda</span>
                </a>
              </li>
          </ul>
        </nav>
      </div>
    </aside>
    <div class="body-wrapper">
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
              
              <li class="nav-item dropdown">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  {{-- <img src="assets/sistem_informasi/images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle"> --}}
                  <i class="fa fa-user"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">
                    <a href="/logout" class="btn btn-outline-primary text-black mx-3 mt-2 d-block">Keluar</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>


      {{-- MAIN CONTENT --}}
      @yield("main")
      {{-- END MAIN CONTENT --}}

      
  <script src="{{ asset('assets/sistem_informasi/libs/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/sistem_informasi/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/sistem_informasi/js/sidebarmenu.js') }}"></script>
  <script src="{{ asset('assets/sistem_informasi/js/app.min.js') }}"></script>
  <script src="{{ asset('assets/sistem_informasi/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assets/sistem_informasi/libs/simplebar/dist/simplebar.js') }}"></script>
  <script src="{{ asset('assets/sistem_informasi/js/dashboard.js') }}"></script>
</body>

</html>