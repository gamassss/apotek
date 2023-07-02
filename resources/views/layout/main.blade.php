<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Apotek | Manajemen Apotek Berbasis Web</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="description" content="" />

    <!-- Favicon -->
    {{-- <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon-agt.png') }}" /> --}}

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('css/demo.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/select2-bs5.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <link rel="stylesheet" href="{{ asset('vendor/libs/apex-charts/apex-charts.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/dtables.css') }}">
    <!-- Page CSS -->
    <!-- Helpers -->
    <script src="{{ asset('vendor/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('js/config.js') }}"></script>

    <script src="{{ asset('vendor/libs/jquery/jquery.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
        integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="{{ asset('css/air-datepicker.css') }}">
    <script src="{{ asset('js/sweetalert.all.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.css"
        integrity="sha512-Z1+R2OfJ0a9kp/21IZNhJ5YEOCVRQh/nYktwmhkPF0FoDQH0Ov2wOOwDrlylzJckX6wSJ5VivCURL+JFfLf/xA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.css" rel="stylesheet" />
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"></script>
    <style>
        /* div.dataTables_processing div {
            display: none;
        } */

        .swal2-container {
            z-index: 20000 !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button {
            border: none;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            border: none;
            background: #e2e8f0;
            color: #334155 !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background-color: #696CFF;
            border: none;
            color: white !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
            color: white !important;
            border: none;
            background-color: #3e41d3;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:active {
            border: none;
            transform: scale(0.95);
            box-shadow: none;
        }

        table.dataTable.display tbody td {
            border-right: 1px solid rgba(0, 0, 0, 0.15);
        }

        table.dataTable thead>tr>th.sorting {
            border-right: 1px solid rgba(0, 0, 0, 0.15);
            border-top: 2px solid rgba(0, 0, 0, 0.30);
            border-bottom: 2px solid rgba(0, 0, 0, 0.30);
        }

        .dataTables_filter {
            margin-bottom: 24px;
        }

        table.dataTable thead>tr>th:first-child {
            border-right: 1px solid rgba(0, 0, 0, 0.15);
            border-left: 2px solid rgba(0, 0, 0, 0.30);
            border-top: 2px solid rgba(0, 0, 0, 0.30);
            border-bottom: 2px solid rgba(0, 0, 0, 0.30);
        }

        table.dataTable thead>tr>th:last-child {
            border-right: 2px solid rgba(0, 0, 0, 0.30);
        }

        table.dataTable thead>tr>th.sorting_disabled.sorting_asc:before,
        table.dataTable thead>tr>th.sorting_disabled.sorting_asc:after {
            content: none;
        }

        #chat2 .form-control {
            border-color: tranparent;
        }

        #chat2 .form-control:focus {
            border-color: transparent;
            box-shadow: inset 0px 0px 0px 1px transparent;
        }

        .divider:after,
        .divider:before {
            content: "";
            flex: 1;
            height: 1px;
            background: #eee;
        }

        .select2-container--open {
            z-index: 9999999
        }
    </style>

</head>

<body>
    {{-- @include('sweetalert::alert') --}}
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <div class="d-flex gap-2">
                        {{-- <img src="{{ asset('img/logo-agt.png') }}" alt="airlangga global travel logo"
                            style="height: 30px;"> --}}
                        <p
                            style="font-size: 30px; color: #7ca3fc; font-weight: 700; font-family: 'Poppins', sans-serif;">
                            Apotek</p>
                    </div>

                    <a href="javascript:void(0);"
                        class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-1">
                    <li class="menu-item {{ Request::is('admin/dashboard/*') ? 'active' : '' }}">
                        <a href="{{ Auth::user()->jabatan == 'manajemen' ? route('dashboard.manajemen') : route('dashboard.pegawai') }}"
                            class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Dashboard</div>
                        </a>
                    </li>

                    <!-- Dashboard -->
                    @if (Auth::user()->username != 'staff')
                        <li class="menu-header small text-uppercase"><span class="menu-header-text">Manajemen</span>
                        </li>
                    @endif
                    @if (Auth::user()->jabatan == 'manajemen')
                        <!-- Forms -->
                        <!-- Tables -->
                        <li class="menu-item {{ Request::is('admin/data/*') ? 'active' : '' }}">
                            <a href="javascript:void(0);" class="menu-link menu-toggle">
                                <i class="menu-icon tf-icons bx bx-table"></i>
                                <div data-i18n="Form Layouts">Data Management</div>
                            </a>
                            <ul class="menu-sub">
                                <li class="menu-item {{ Request::is('admin/data/pegawai') ? 'active' : '' }}">
                                    <a href="{{ route('pegawai.index') }}" class="menu-link">
                                        <div data-i18n="Horizontal Form">Pegawai</div>
                                    </a>
                                </li>
                                <li class="menu-item {{ Request::is('admin/data/member') ? 'active' : '' }}">
                                    <a href="{{ route('member.index') }}" class="menu-link">
                                        <div data-i18n="Horizontal Form">Member</div>
                                    </a>
                                </li>
                                <li class="menu-item {{ Request::is('admin/data/obat') ? 'active' : '' }}">
                                    <a href="{{ route('obat.index') }}" class="menu-link">
                                        <div data-i18n="Horizontal Form">Obat</div>
                                    </a>
                                </li>
                                <li class="menu-item {{ Request::is('admin/data/template-chat') ? 'active' : '' }}">
                                    <a href="{{ route('template-chat.index') }}" class="menu-link">
                                        <div data-i18n="Horizontal Form">Template Chat</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif
                    @if (Auth::user()->jabatan == 'pegawai' && Auth::user()->username != 'staff')
                        <!-- Forms -->
                        <!-- Tables -->
                        <li class="menu-item {{ Request::is('admin/data/*') ? 'active' : '' }}">
                            <a href="javascript:void(0);" class="menu-link menu-toggle">
                                <i class="menu-icon tf-icons bx bx-table"></i>
                                <div data-i18n="Form Layouts">Data Management</div>
                            </a>
                            <ul class="menu-sub">

                                <li class="menu-item {{ Request::is('admin/data/member') ? 'active' : '' }}">
                                    <a href="{{ route('member.index') }}" class="menu-link">
                                        <div data-i18n="Horizontal Form">Member</div>
                                    </a>
                                </li>
                                <li class="menu-item {{ Request::is('admin/data/obat') ? 'active' : '' }}">
                                    <a href="{{ route('obat.index') }}" class="menu-link">
                                        <div data-i18n="Horizontal Form">Obat</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-header small text-uppercase"><span class="menu-header-text">Chats</span>
                        <li class="menu-item {{ Request::is('admin/chats') ? 'active' : '' }}">
                            <a href="{{ route('chat.index') }}" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-chat"></i>
                                <div data-i18n="Analytics">Chats</div>
                            </a>
                        </li>
                    @endif
                    @if (Auth::user()->username == 'staff')
                        <li class="menu-header small text-uppercase"><span class="menu-header-text">Chats</span>
                        <li class="menu-item {{ Request::is('admin/chats') ? 'active' : '' }}">
                            <a href="{{ route('chat.index') }}" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-chat"></i>
                                <div data-i18n="Analytics">Chats</div>
                            </a>
                        </li>
                    @endif
                    @if (Auth::user()->username != 'staff')
                        <li class="menu-header small text-uppercase"><span class="menu-header-text">Transaksi</span>
                        <li class="menu-item {{ Request::is('admin/transaksi-obat') ? 'active' : '' }}">
                            <a href="{{ route('transaksi-obat.index') }}" class="menu-link">
                                <i class="menu-icon tf-icons bx bxs-dollar-circle"></i>
                                <div data-i18n="Analytics">Transaksi</div>
                            </a>
                        </li>
                    @endif

                </ul>

            </aside>
            <!-- / Menu -->
            <div class="layout-page" style="{{ Request::is('admin/chats') ? 'max-height: 100vh;' : '' }}">
                <!-- Navbar -->

                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                    id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="bx bx-menu bx-sm"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                            <!-- User -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                    data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        <img src="{{ asset('img/avatars/6.png') }}" alt
                                            class="w-px-40 h-auto rounded-circle" />
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        <img src="{{ asset('img/avatars/6.png') }}" alt
                                                            class="w-px-40 h-auto rounded-circle" />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <span class="fw-semibold d-block">{{ Auth::user()->name }}</span>
                                                    <small class="text-muted">{{ Auth::user()->jabatan }}</small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <form action="{{ route('logout') }}" method="post">
                                            @csrf
                                            <button class="dropdown-item" type="submit">
                                                <i class="bx bx-power-off me-2"></i>
                                                <span class="align-middle">Log Out</span>
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            <!--/ User -->
                        </ul>
                    </div>
                </nav>

                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        @yield('content')
                    </div>

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout wrapper -->
        </div>

        <!-- Ajax Setup -->
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>

        <!-- Core JS -->
        <!-- build:js assets/vendor/js/core.js -->
        <script src="{{ asset('vendor/libs/popper/popper.js') }}"></script>
        <script src="{{ asset('vendor/js/bootstrap.js') }}"></script>

        <script src="{{ asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

        <script src="{{ asset('vendor/js/menu.js') }}"></script>
        <!-- endbuild -->
        <script src="{{ asset('js/extended-ui-perfect-scrollbar.js') }}"></script>
        <!-- Vendors JS -->
        <script src="{{ asset('vendor/libs/apex-charts/apexcharts.js') }}"></script>

        <!-- Main JS -->
        <script src="{{ asset('js/main.js') }}"></script>
        <script src="{{ asset('js/select2.js') }}"></script>
        <script src="{{ asset('js/index.js') }}"></script>

        <!-- Page JS -->
        <script src="{{ asset('js/dashboards-analytics.js') }}"></script>
        <script src="{{ asset('js/dtables.js') }}"></script>
        <!-- datepicker -->
        {{-- <script src="{{ asset('js/air-datepicker.js') }}"></script>
        <script src="{{ asset('js/datepicker-pemesanan.js') }}"></script> --}}
        @stack('script')
</body>

</html>
