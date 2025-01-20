<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title', 'Dashboard')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Dexignlabs">
    <meta name="description" content="Elevate your administrative efficiency and enhance productivity with the Fillow SaaS Admin Dashboard Template. Designed to streamline your tasks, this powerful tool provides a user-friendly interface, robust features, and customizable options.">
    <meta name="keywords" content="admin, admin dashboard, analytics, bootstrap5, responsive design, data visualization, reporting, dark mode, mobile-friendly">
    <meta property="og:title" content="Fillow Saas Admin Dashboard">
    <meta property="og:description" content="Elevate your administrative efficiency with Fillow SaaS Admin Dashboard Template.">
    <meta property="og:image" content="https://fillow.dexignlab.com/xhtml/social-image.png">
    <meta name="twitter:card" content="summary_large_image">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}">

    <!-- CSS -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <!-- Custom Styles -->
    <link href="{{ asset('assets/vendor/bootstrap-select/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/fullcalendar/css/main.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/dark-mode.css') }}" rel="stylesheet">

    <!-- JavaScript -->
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
</head>


<body>
    <div id="preloader">
        <div class="lds-ripple">
            <div></div>
            <div></div>
        </div>
    </div>
    <div id="main-wrapper">
        <!-- Navigation and Header -->
        <div class="nav-header">
            <a href="{{ url('/') }}" class="brand-logo">
                <div class="brand-title">
                    <h1>Zenig</h1>
                </div>
            </a>
            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="dashboard_bar">
                                Dashboard
                            </div>
                        </div>
                        <ul class="navbar-nav header-right">
                            <li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link bell dz-theme-mode" href="javascript:void(0);">
                                    <i id="icon-light" class="fas fa-sun"></i>
                                    <i id="icon-dark" class="fas fa-moon"></i>
                                </a>
                            </li>
                            <li class="nav-item dropdown header-profile">
                                <a href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                                    @auth
                                        <span class="user-name">{{ Auth::user()->name }}</span>
                                    @else
                                        <span class="user-name">Guest</span>
                                    @endauth
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    @auth
                                        <form action="{{ route('login') }}" method="POST">
                                            @csrf
                                            <button type="submit" class="dropdown-item ai-icon">
                                                <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                                    <polyline points="16 17 21 12 16 7"></polyline>
                                                    <line x1="21" y1="12" x2="9" y2="12"></line>
                                                </svg>
                                                <span class="ms-2">Logout</span>
                                            </button>
                                        </form>
                                    @else
                                        <a href="{{ route('login') }}" class="dropdown-item ai-icon">
                                            <svg id="icon-login" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M12 21v-6"></path>
                                                <polyline points="19 14 12 21 5 14"></polyline>
                                                <line x1="12" y1="3" x2="12" y2="15"></line>
                                            </svg>
                                            <span class="ms-2">Login</span>
                                        </a>
                                    @endauth
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>

        <!-- Main Menu -->
        <div class="dlabnav">
            <div class="dlabnav-scroll">
                <ul class="metismenu" id="menu">
                    <li><a href="{{ url('/home') }}" class="" aria-expanded="false">
                            <i class="fas fa-home"></i>
                            <span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li><a href="{{ url('roles-permissions') }}" class="" aria-expanded="false">
                            <i class="fas fa-lock"></i>
                            <span class="nav-text">Role & Permission</span>
                        </a>
                    </li>
                    <li><a href="{{ url('staff') }}" class="" aria-expanded="false">
                            <i class="fas fa-paperclip"></i>
                            <span class="nav-text">Staff Registration</span>
                        </a>
                    </li>
                    <li><a href="{{ url('departments') }}" class="" aria-expanded="false">
                            <i class="fas fa-building"></i>
                            <span class="nav-text">Department</span>
                        </a>
                    </li>
                    <li><a href="{{ url('designations') }}" class="" aria-expanded="false">
                            <i class="fas fa-user-tie"></i>
                            <span class="nav-text">Designation</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Content Body -->
        <div class="content-body default-height">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('assets/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/fullcalendar/js/main.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/moment/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins-init/calendar.js') }}"></script>
    <script src="{{ asset('assets/js/custom.min.js') }}"></script>
    <script src="{{ asset('assets/js/dlabnav-init.js') }}"></script>
    <script src="{{ asset('assets/js/demo.js') }}"></script>
    <script src="{{ asset('assets/js/styleSwitcher.js') }}"></script>
</body>

</html>



 