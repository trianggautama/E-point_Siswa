
<!doctype html>
<html lang="en">

<head>

    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--====== Title ======-->
    <title>E-Point</title>

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{asset('depan/images/favicon.png')}}" type="image/png">

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="{{asset('depan/css/bootstrap.min.css')}}">

    <!--====== Line Icons css ======-->
    <link rel="stylesheet" href="{{asset('depan/css/LineIcons.css')}}">

    <!--====== Magnific Popup css ======-->
    <link rel="stylesheet" href="{{asset('depan/css/magnific-popup.css')}}">

    <!--====== Default css ======-->
    <link rel="stylesheet" href="{{asset('depan/css/default.css')}}">

    <!--====== Style css ======-->
    <link rel="stylesheet" href="{{asset('depan/css/style.css')}}">

    <!-- vendor css -->
    <link href="{{asset('admin/lib/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/lib/ionicons/css/ionicons.min.css')}}" rel="stylesheet">    
    <link href="{{asset('admin/lib/prismjs/themes/prism-vs.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('admin/lib/datatables.net-dt/css/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css')}}">

    <link rel="stylesheet" href="{{asset('admin/assets/css/dashforge.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/css/dashforge.dashboard.css')}}">

</head>

<body>

    <!--====== HEADER PART START ======-->

    <header class="header-area">
        <div class="navgition navgition-transparent">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="#">
                                <img src="{{asset('images/logo.png')}}" alt="Logo" width="60px">
                            </a>

                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarOne" aria-controls="navbarOne" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarOne">
                                <ul class="navbar-nav m-auto">
                                    <li class="nav-item active">
                                        <a class="page-scroll" href="#home">Header</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#service">Visi dan Misi</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#pricing">Tentang Aplikasi</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#contact">Kontak</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="navbar-social d-none d-sm-flex align-items-center">
                                <ul>
                                    <li><a href="{{Route('index')}}"><i class="lni-user"></i> <small>Login</small></a></li>                                  
                                </ul>
                            </div>
                        </nav> <!-- navbar -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- navgition -->

        <div id="home" class="header-hero bg_cover" style="background-image: url(images/bg.jpg)">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-10">
                        <div class="header-content text-center">
                        <br>
                            <h3 class="header-title">E-Point</h3>
                            <p class="text">Aplikasi Manajemen E-Point  Prestasi dan Pelanggaran  Siswa pada  MIN 3 Tanah Laut</p>
                            <ul class="header-btn">
                                <li><a class="main-btn btn-two " href="#pricing">Poin Siswa <i class="lni-play"></i></a></li>
                            </ul>
                        </div> <!-- header content -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
            <div class="header-shape">
                <img src="{{asset('depan/images/header-shape.svg')}}" alt="shape">
            </div>
        </div> <!-- header content -->
    </header>

    <!--====== HEADER PART ENDS ======-->

    <!--====== SERVICES PART START ======-->

    <section id="service" class="services-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title pb-10">
                        <h4 class="title">Visi dan Misi</h4>
                        <p class="text">Siswa yang Mampu Membaca Al-Qur'an, Beribadah, Berakhlakul Karimah, Terampil, Berilmu Pengetahuan dan Mampu Mengaktualisasikan Diri dalam Kehidupan Masyarakat.</p>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row">
                <div class="col-lg-7">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="services-content mt-40 d-sm-flex">
                                <div class="services-icon">
                                    <i class="lni-arrow-top-right"></i>
                                </div>
                                <div class="services-content media-body">
                                    <h4 class="services-title">1</h4>
                                    <p class="text">Meningkatkan pelaksanaan pendidikan.</p>
                                </div>
                            </div> <!-- services content -->
                        </div>
                        <div class="col-md-6">
                            <div class="services-content mt-40 d-sm-flex">
                                <div class="services-icon">
                                    <i class="lni-book"></i>
                                </div>
                                <div class="services-content media-body">
                                    <h4 class="services-title">2</h4>
                                    <p class="text">Meningkatkan pelaksanaan bimbingan dan penyuluhan.</p>
                                </div>
                            </div> <!-- services content -->
                        </div>
                        <div class="col-md-6">
                            <div class="services-content mt-40 d-sm-flex">
                                <div class="services-icon">
                                    <i class="lni-handshake"></i>
                                </div>
                                <div class="services-content media-body">
                                    <h4 class="services-title">3</h4>
                                    <p class="text">Meningkatkan hubungan kerja sama dengan orang tua siswa dan masyarakat.</p>
                                </div>
                            </div> <!-- services content -->
                        </div>
                        <div class="col-md-6">
                            <div class="services-content mt-40 d-sm-flex">
                                <div class="services-icon">
                                    <i class="lni-bulb"></i>
                                </div>
                                <div class="services-content media-body">
                                    <h4 class="services-title">4</h4>
                                    <p class="text">Meningkatkan tata usaha, rumah tangga sekolah, perpustakaan dan laboratorium.</p>
                                </div>
                            </div> <!-- services content -->
                        </div>
                    </div> <!-- row -->
                </div> <!-- row -->
            </div> <!-- row -->
        </div> <!-- conteiner -->
        <div class="services-image d-lg-flex align-items-center">
            <div class="image">
                <img src="{{asset('depan/images/services.png')}}" alt="Services">
            </div>
        </div> <!-- services image -->
    </section>

    <!--====== SERVICES PART ENDS ======-->

    <!--====== PRICING PART START ======-->

    <section id="pricing" class="pricing-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title text-center pb-10">
                        <h1 >Poin Siswa</h>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row justify-content-center">
                
                <div class="col-lg-12 col-md-12 col-sm-12">
                   <div class="card">
                       <div class="card-body">
                       <table id="dataTable" class="table text-center">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIS</th>
                                    <th>Nama</th>
                                    <th>Kelas</th>
                                    <th>point</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $d)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$d->NIS}}</td>
                                    <td>{{$d->nama}}</td>
                                    <td>
                                    @if($d->kelas_siswa->isNotEmpty())
                                    {{$d->kelas_siswa->last()->kelas->kelas}}
                                    @endif
                                    </td>
                                    <td>{{$d->point}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                       </div>
                   </div>
                </div>
            </div> <!-- row -->
        </div> <!-- conteiner -->
    </section>

    <!--====== PRICING PART ENDS ======-->
    
     <!--====== CALL TO ACTION PART START ======-->

    <section id="call-to-action" class="call-to-action">
        <div class="call-action-image">
            <img src="{{asset('depan/images/call-to-action.png')}}" alt="call-to-action">
        </div>
        
        <div class="container-fluid">
            <div class="row justify-content-end">
                <div class="col-lg-6">
                    <div class="call-action-content text-center">
                        <h2 class="call-title">MIN 3 Tanah Laut</h2>
                        <p class="text">Berdirinya  Sekolah MIN 3 Tanah Laut adalah atas desakan warga Pabahanan Kecamatan Pelaihari sekitar lingkungan tersebut rata-rata berprofesi Wiraswasta, Petani, Pegawai Negeri Sipil dan Aparat Negara. Madrasah ini pun diresmikan  sebagai lembaga pendidikan dengan nama sekolah pada awalnya Madrasah Ibtidaiyah Negeri Pabahanan menjadi  Madrasah Ibtidaiyah Negeri 3 Tanah Laut yang sampai akhirnya.</p>
                    </div> <!-- slider-content -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== CALL TO ACTION PART ENDS ======-->
    
    <!--====== CONTACT PART START ======-->

    <section id="contact" class="contact-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title text-center pb-10">
                        <h4 class="title">Get In touch</h4>
                        <p class="text">Stop wasting time and money designing and managing a website that doesn’t get results. Happiness guaranteed!</p>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row justify-content-center">
                <div class="col-lg-8">
                   
                </div>
            </div> <!-- row -->
        </div> <!-- conteiner -->
    </section>

    <!--====== CONTACT PART ENDS ======-->

    <!--====== FOOTER PART START ======-->

    <footer id="footer" class="footer-area">
        <div class="footer-widget">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer-logo-support d-md-flex align-items-end justify-content-between">
                            <div class="footer-logo d-flex align-items-end">
                                <a class="mt-30" href="index.html"><img src="{{asset('depan/images/logo.svg')}}" alt="Logo"></a>

                            </div> <!-- footer logo -->
                            
                        </div> <!-- footer logo support -->
                    </div>
                </div> <!-- row -->
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="footer-link">
                            <h6 class="footer-title">Alamat</h6>
                            <p>Jl. Padang Raya No.25 Pabahanan Kec. Pelaihari Kab. Tanah Laut</p>
                        </div> <!-- footer link -->
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-7">
                        <div class="footer-newsletter">
                            <h6 class="footer-title">Subscribe Newsletter</h6>
                            <p class="text">Subscribe weekly newsletter to stay upto date. We don’t send spam.</p>
                        </div> <!-- footer newsletter -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- footer widget -->
        
        <div class="footer-copyright">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright text-center">
                            <p class="text">Template Crafted by <a rel="nofollow" href="https://uideck.com">UIdeck</a> - UI Powered by <a el="nofollow" href="https://rebrand.ly/ayroui">AyroUI</a></p>
                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- footer copyright -->
    </footer>

    <!--====== FOOTER PART ENDS ======-->

    <!--====== BACK TO TOP PART START ======-->

    <a class="back-to-top" href="#"><i class="lni-chevron-up"></i></a>

    <!--====== BACK TO TOP PART ENDS ======-->









    <!--====== jquery js ======-->
    <script src="{{asset('depan/js/vendor/modernizr-3.6.0.min.js')}}"></script>
    <script src="{{asset('depan/js/vendor/jquery-1.12.4.min.js')}}"></script>

    <!--====== Bootstrap js ======-->
    <script src="{{asset('depan/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('depan/js/popper.min.js')}}"></script>

    <!--====== Scrolling Nav js ======-->
    <script src="{{asset('depan/js/jquery.easing.min.js')}}"></script>
    <script src="{{asset('depan/js/scrolling-nav.js')}}"></script>

    <!--====== Magnific Popup js ======-->
    <script src="{{asset('depan/js/jquery.magnific-popup.min.js')}}"></script>

    <!--====== Main js ======-->
    <script src="{{asset('depan/js/main.js')}}"></script>

    <!-- Databale -->
    <script src="{{asset('admin/lib/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/lib/datatables.net-dt/js/dataTables.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/lib/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('admin/lib/datatables.net-responsive-dt/js/responsive.dataTables.min.js')}}"></script>
    <script>
            $(function () {
        'use strict'

        $('#dataTable').DataTable({
            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
                lengthMenu: '_MENU_ items/page',
            }
        });
    });
    </script>
</body>

</html>
