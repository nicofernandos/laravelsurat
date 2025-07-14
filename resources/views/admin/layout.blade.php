<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    @if (session('users')->level == 'Admin')
        <title>Admin Panel</title>
    @elseif (session('users')->level == 'Kepala Desa')
        <title>Kepala Desa Panel</title>
    @elseif (session('users')->level == 'Arsiparis')
        <title>Arsiparis Panel</title>
    @elseif (session('users')->level == 'Kasubbag Tatausaha')
        <title>Arsiparis Panel</title>
    @elseif (session('users')->level == 'Kepala Biro')
        <title>Arsiparis Panel</title>
    @endif
    <!-- Favicon icon -->
    <link href="{{ asset('foto/logoe.jpg') }}" rel="icon"> <!-- Pignose Calender -->
    <link href="/admin/plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="/admin/plugins/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="/admin/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
    <!-- Custom Stylesheet -->
    <link href="/admin/css/style.css" rel="stylesheet">
    <link href="/admin/plugins/tables/css/datatable/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@8/dist/sweetalert2.min.css" rel=" stylesheet">
</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3"
                    stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <div class="brand-logo" style="background-color: #a01626 !important">
                <a href="#">
                    <center>
                        <b class="logo-abbr"><img src="{{ url('foto/logoe.jpg') }}" width="30px" alt="">
                        </b>
                        <span class="logo-compact"><img src="{{ url('foto/logoe.jpg') }}" width="30px"
                                alt=""></span>
                        <span class="brand-title">
                            <img src="{{ url('foto/logoe.jpg') }}" width="30px" alt="">
                        </span>
                    </center>
                </a>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content clearfix">

                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
                <div class="header-left">
                </div>
                <div class="header-right">
                    <ul class="clearfix">
                        <li class="icons dropdown">
                            <div class="user-img c-pointer position-relative" data-toggle="dropdown">
                                <span class="activity active"></span>
                                <img src="{{ asset('foto/user.png') }}" height="40" width="40" alt="">
                            </div>
                            <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a href="{{ url('panel/profil') }}"><i class="icon-user"></i>
                                                <span>Profil</span></a>
                                        </li>
                                        <li><a href="{{ url('panel/logout') }}" class="blogout"><i class="icon-key"></i>
                                                <span>Logout</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <?php
                    if(session('users')->level == 'Admin') {
                    ?>
        <div class="nk-sidebar">
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label">Menu Utama</li>
                    <li>
                        <a href="{{ url('panel/dashboard') }}" aria-expanded="false">
                            <i class="icon-home menu-icon"></i><span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                   <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="icon-envelope menu-icon"></i><span class="nav-text">Surat</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{ url('panel/surat') }}">Semua Surat</a></li>

                        @foreach ($datakategori as $row)
                            <li><a href="{{ url('panel/suratkategori/' . $row->id) }}">{{ $row->judulkategori }}</a></li>
                        @endforeach
                    </ul>
                </li>

                    <li>
                        <a href="{{ url('panel/kategori') }}" aria-expanded="false">
                            <i class="icon-list menu-icon"></i><span class="nav-text">Kategori</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('panel/logout') }}" aria-expanded="false">
                            <i class="fa fa-power-off menu-icon"></i><span class="nav-text">Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <?php } ?>

        <?php
                    if(session('users')->level == 'Kasubbag Tatausaha' || session('users')->level == 'Kepala Biro') {
                    ?>
        <div class="nk-sidebar">
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label">Main Menu</li>
                    <li>
                        <a href="{{ url('panel/dashboard') }}" aria-expanded="false">
                            <i class="icon-home menu-icon"></i><span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-people menu-icon"></i><span class="nav-text">Menu Pegawai</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ url('panel/pegawaidaftar') }}">Pegawai</a></li>
                            <li><a href="{{ url('panel/jabatandaftar') }}">Jabatan</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-folder menu-icon"></i><span class="nav-text">Data Arsip</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ url('panel/arsipkategoridaftar') }}">Kategori Arsip</a></li>
                            <li><a href="{{ url('panel/arsipjenisdaftar') }}">Jenis Arsip</a></li>
                            <li><a href="{{ url('panel/arsipdaftar') }}">Daftar Arsip</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-list menu-icon"></i><span class="nav-text">Usulan Musnah</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ url('panel/musnahdaftar') }}">Detail Musnah</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <?php } ?>

        <?php
                    if(session('users')->level == 'Arsiparis') {
                    ?>
        <div class="nk-sidebar">
            <div class="nk-nav-scroll">

                <ul class="metismenu" id="menu">
                    <li class="nav-label">Main Menu</li>
                    <li>
                        <a href="{{ url('panel/dashboard') }}" aria-expanded="false">
                            <i class="icon-home menu-icon"></i><span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-folder menu-icon"></i><span class="nav-text">Data Arsip</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ url('panel/arsipkategoridaftar') }}">Kategori Arsip</a></li>
                            <li><a href="{{ url('panel/arsipjenisdaftar') }}">Jenis Arsip</a></li>
                            <li><a href="{{ url('panel/arsipdaftar') }}">Daftar Arsip</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-list menu-icon"></i><span class="nav-text">Usulan Musnah</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ url('panel/musnahdaftar') }}">Detail Musnah</a></li>
                        </ul>
                    </li>
                </ul>

            </div>
        </div>
        <?php } ?>

        @yield('content')
        <div class="footer">
            <div class="copyright" style="background-color: #7c0a21 !important">
                <p style="color: #FFFFFF">
                </p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="/admin/plugins/common/common.min.js"></script>
    <script src="/admin/js/custom.min.js"></script>
    <script src="/admin/js/settings.js"></script>
    <script src="/admin/js/gleek.js"></script>
    <script src="/admin/js/styleSwitcher.js"></script>

    <!-- Chartjs -->
    <script src="/admin/plugins/chart.js/Chart.bundle.min.js"></script>
    <!-- Circle progress -->
    <script src="/admin/plugins/circle-progress/circle-progress.min.js"></script>
    <!-- Datamap -->
    <script src="/admin/plugins/d3v3/index.js"></script>
    <script src="/admin/plugins/topojson/topojson.min.js"></script>
    <script src="/admin/plugins/datamaps/datamaps.world.min.js"></script>
    <!-- Morrisjs -->
    <script src="/admin/plugins/raphael/raphael.min.js"></script>
    <script src="/admin/plugins/morris/morris.min.js"></script>
    <!-- Pignose Calender -->
    <script src="/admin/plugins/moment/moment.min.js"></script>
    <script src="/admin/plugins/pg-calendar/js/pignose.calendar.min.js"></script>
    <!-- ChartistJS -->
    <script src="/admin/plugins/chartist/js/chartist.min.js"></script>
    <script src="/admin/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>
    <script src="/admin/plugins/tables/js/jquery.dataTables.min.js"></script>
    <script src="/admin/plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        });
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script>
        $(function() {
            @if ($message = session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: '<?= session('success') ?>'
                })
            @endif
        });
        $(function() {
            @if ($message = session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: '<?= session('error') ?>'
                })
            @endif
        });
        const flashData = $('.flash-data').data('flashdata');
        // console.log(flashData);
        if (flashData) {
            Swal.fire({
                title: 'Berhasil !',
                text: '' + flashData,
                icon: 'success',
                showConfirmButton: false,
                timer: 3500
            });
        }
        const flashDataError = $('.flash-data-error').data('flashdata');
        // console.log(flashData);
        if (flashDataError) {
            Swal.fire({
                title: 'Gagal !',
                text: '' + flashDataError,
                icon: 'error',
                showConfirmButton: false,
                timer: 3500
            });
        }
        $('.bdel').on('click', function(e) {
            e.preventDefault();
            const href = $(this).attr('href');
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success m-1',
                    cancelButton: 'btn btn-danger m-1'
                },
                buttonsStyling: false
            });
            swalWithBootstrapButtons.fire({
                title: 'Yakin data ini akan dihapus?',
                text: "Data tidak akan bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    document.location.href = href;
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Dibatalkan',
                        '',
                        'error'
                    )
                }
            });
        });
        $('.blogout').on('click', function(e) {
            e.preventDefault();
            const href = $(this).attr('href');
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success m-1',
                    cancelButton: 'btn btn-danger m-1'
                },
                buttonsStyling: false
            });
            swalWithBootstrapButtons.fire({
                title: 'Apakah Anda yakin ingin logout',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Logout!',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    document.location.href = href;
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Dibatalkan',
                        '',
                        'error'
                    )
                }
            });
        });
        $('.bconfir').on('click', function(e) {
            e.preventDefault();
            const href = $(this).attr('href');
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            });
            swalWithBootstrapButtons.fire({
                title: 'INFO',
                text: "Dengan mengklik tombol 'Ya', notifikasi tagihan SPP akan masuk ke ruang orang tua/wali.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya !',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    document.location.href = href;
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Dibatalkan',
                        '',
                        'error'
                    )
                }
            });
        });
    </script>
</body>

</html>
