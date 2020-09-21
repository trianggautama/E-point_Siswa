<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('admin/assets/img/favicon.png')}}">

    <title>E-point Siswa</title>

    <!-- vendor css -->
    <link href="{{asset('admin/lib/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/lib/ionicons/css/ionicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/lib/prismjs/themes/prism-vs.css')}}" rel="stylesheet">


    <!-- Databale -->
    <link href="{{asset('admin/lib/typicons.font/typicons.css')}}" rel="stylesheet">
    <link href="{{asset('admin/lib/prismjs/themes/prism-vs.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('admin/lib/datatables.net-dt/css/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css')}}">



    <!-- DashForge CSS -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/dashforge.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/css/dashforge.dashboard.css')}}">
    <link id="dfMode" rel="stylesheet" href="{{asset('admin/assets/css/skin.light.css')}}">
    <link id="dfSkin" rel="stylesheet" href="{{asset('admin/assets/css/skin.gradient1.css')}}">

    <!-- Sweetalert -->
    <link rel="stylesheet" href="{{asset('vendor/sweetalert/sweetalert.all.css')}}">

    <link rel="stylesheet" href="{{asset('vendor/select/bootstrap-select.min.css')}}">


</head>

<body class="page-profile">

    <aside class="aside aside-fixed">
        <div class="aside-header">
            <a href="/" class="aside-logo">E-point</a>
            <a href="" class="aside-menu-link">
                <i data-feather="menu"></i>
                <i data-feather="x"></i>
            </a>
        </div>
        <div class="aside-body">
            <div class="aside-loggedin">
                <div class="d-flex align-items-center justify-content-start">
                    <a href="" class="avatar"><img src="{{asset('images/user/'. Auth::user()->foto)}}"
                            class="rounded-circle" alt=""></a>
                    <div class="aside-alert-link">
                        <a href="" class="new" data-toggle="tooltip" title="You have 4 new notifications"><i
                                data-feather="bell"></i></a>
                        <a href="" data-toggle="tooltip" title="Sign out"><i data-feather="log-out"></i></a>
                    </div>
                </div>
                <div class="aside-loggedin-user">
                    <a href="#loggedinMenu" class="d-flex align-items-center justify-content-between mg-b-2"
                        data-toggle="collapse">
                        <h6 class="tx-semibold mg-b-0">{{Auth::user()->nama}}</h6>
                        <i data-feather="chevron-down"></i>
                    </a>
                    <p class="tx-color-03 tx-12 mg-b-0">Admin Aplikasi</p>
                </div>
                <div class="collapse" id="loggedinMenu">
                    <ul class="nav nav-aside mg-b-0">
                        <!-- <li class="nav-item"><a href="" class="nav-link"><i data-feather="edit"></i> <span>Edit
                                    Profile</span></a>
                        </li>
                        <li class="nav-item"><a href="" class="nav-link"><i data-feather="user"></i> <span>View
                                    Profile</span></a>
                        </li> -->
                    </ul>
                </div>
            </div><!-- aside-loggedin -->
            <ul class="nav nav-aside">
                <li class="nav-label mg-t-25">Master Data</li>
                <li class="nav-item with-sub">
                    <a href="" class="nav-link"><i data-feather="user"></i> <span>Pegawai</span></a>
                    <ul>
                        <li><a href="{{Route('userIndex')}}">Admin</a></li>
                        <li><a href="{{Route('pejabatIndex')}}">Guru</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{Route('tahunAjaranIndex')}}" class="nav-link"><i data-feather="file-text"></i><span>Tahun Ajaran</span></a></li>
                <li class="nav-item with-sub">
                    <a href="" class="nav-link"><i data-feather="users"></i> <span>Siswa</span></a>
                    <ul>
                        <li><a href="{{Route('kelasIndex')}}">Data Kelas</a></li>
                        <li><a href="{{Route('siswaIndex')}}">Data Siswa</a></li>
                        <li><a href="{{Route('waliIndex')}}">Data Wali Siswa</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{Route('pedomanIndex')}}" class="nav-link"><i data-feather="file-text"></i>
                        <span>Panduan
                            Poin</span></a></li>
                <li class="nav-label mg-t-25">Konseling Siswa</li>
                <li class="nav-item"><a href="{{Route('konsultasiIndex')}}" class="nav-link"><i data-feather="box"></i>
                        <span> Konsultasi Siswa</span></a></li>
                <li class="nav-item"><a href="{{Route('pointIndex')}}" class="nav-link"><i
                            data-feather="check-square"></i>
                        <span>Poin
                            Siswa</span></a></li>
                <li class="nav-item"><a href="{{Route('pelanggaranIndex')}}" class="nav-link"><i
                            data-feather="alert-circle"></i>
                        <span>Pelanggaran Siswa</span></a></li>
                <li class="nav-item"><a href="{{Route('prestasiIndex')}}" class="nav-link"><i data-feather="award"></i>
                        <span>Prestasi
                            Siswa</span></a></li>
                <!-- <li class="nav-item"><a href="{{Route('prestasiIndex')}}" class="nav-link"><i data-feather="home"></i>
                        <span>Kunjungan Rumah</span></a></li> -->
            </ul>
        </div>
    </aside>

    <div class="content ht-100v pd-0">
        <div class="content-header">
            <div class="content-search">
                <p class="pt-3">Aplikasi E-pont Siswa MIN 3 Tanah Laut</p>
            </div>
            <nav class="nav">
                @guest
                <a class="nav-link" href="{{ route('login') }}"><i data-feather="log-in"></i>{{ __('Login') }}</a>
                @else
                <a class="nav-link" data-toggle="tooltip" title="Sign out" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    <i data-feather="log-out"></i>{{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                @endguest
            </nav>
        </div><!-- content-header -->
        @yield('content')
    </div>
    @include('sweetalert::alert')
    <script src="{{asset('admin/lib/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admin/lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('admin/lib/feather-icons/feather.min.js')}}"></script>
    <script src="{{asset('admin/lib/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('admin/lib/jquery.flot/jquery.flot.js')}}"></script>
    <script src="{{asset('admin/lib/jquery.flot/jquery.flot.stack.js')}}"></script>
    <script src="{{asset('admin/lib/jquery.flot/jquery.flot.resize.js')}}"></script>


    <!-- Select2 -->

    <script src="{{asset('admin/assets/js/dashforge.js')}}"></script>
    <script src="{{asset('admin/assets/js/dashforge.aside.js')}}"></script>
    <script src="{{asset('admin/assets/js/dashforge.sampledata.js')}}"></script>

    <!-- append theme customizer -->
    <script src="{{asset('admin/lib/js-cookie/js.cookie.js')}}"></script>
    <!-- Databale -->
    <script src="{{asset('admin/lib/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/lib/datatables.net-dt/js/dataTables.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/lib/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('admin/lib/datatables.net-responsive-dt/js/responsive.dataTables.min.js')}}"></script>

    <!-- Sweetalert -->
    <script src="{{asset('vendor/sweetalert/sweetalert.all.js')}}"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="{{asset('vendor/select/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('vendor/chart/Chart.min.js')}}"></script>


    @yield('scripts')
</body>

</html>