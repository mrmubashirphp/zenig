<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ config('app.name', 'Zenig') }}</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <link href="{{ asset('vendor/bootstrap-select/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/fullcalendar/css/main.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('//cdn.datatables.net/2.2.1/css/dataTables.dataTables.min.css') }}">
    <link href="{{ asset('https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css') }}"
        rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>


<body>
    <div id="preloader">
        <div class="lds-ripple">
            <div></div>
            <div></div>
        </div>
    </div>
    <div id="main-wrapper">
        <div class="nav-header">
            <a href="{{ url('/') }}" class="brand-logo">
                <!-- <svg class="logo-abbr" width="55" height="55" viewBox="0 0 55 55" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M27.5 0C12.3122 0 0 12.3122 0 27.5C0 42.6878 12.3122 55 27.5 55C42.6878 55 55 42.6878 55 27.5C55 12.3122 42.6878 0 27.5 0ZM28.0092 46H19L19.0001 34.9784L19 27.5803V24.4779C19 14.3752 24.0922 10 35.3733 10V17.5571C29.8894 17.5571 28.0092 19.4663 28.0092 24.4779V27.5803H36V34.9784H28.0092V46Z"
                        fill="url(#paint0_linear)" />
                </svg> -->
                <div class="brand-title">
                    <h4 class="m-0 p-0"><b>Zenig Auto</b></h4>
                </div>
            </a>
            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>

        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="dashboard_bar">

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
                                <a class="" href="javascript:void(0);" role="" data-bs-toggle="dropdown">

                                    @auth
                                        <span class="user-name">{{ Auth::user()->name }}</span>
                                    @else
                                        <span class="user-name">Guest</span>
                                    @endauth
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    @auth
                                        <!-- Logout Form -->
                                        <form action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <button type="submit" class="dropdown-item ai-icon">
                                                <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger"
                                                    width="18" height="18" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                                    <polyline points="16 17 21 12 16 7"></polyline>
                                                    <line x1="21" y1="12" x2="9" y2="12">
                                                    </line>
                                                </svg>
                                                <span class="ms-2">Logout</span>
                                            </button>
                                        </form>
                                    @else
                                        <a href="{{ route('login') }}" class="dropdown-item ai-icon">
                                            <svg id="icon-login" xmlns="http://www.w3.org/2000/svg" class="text-primary"
                                                width="18" height="18" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
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
                    <li>
                    <a href="{{ route('staff.index') }}" class="" aria-expanded="false">
    <i class="fas fa-paperclip"></i>
    <span class="nav-text">User Attachment</span>
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
                    <li>

                        <a class="has-arrow" href="javascript:void(0);" aria-expanded="false">
                            <i class="fas fa-database"></i>
                            <span class="nav-text">Database</span>
                        </a>
                        <ul aria-expanded="false">
                            <li class="area_level"><a href="{{ route('area.level.index') }}">Area Level</a></li>
                            <li class=""><a href="{{ route('area.rack.index') }}">Area Rack</a></li>
                            <li class=""><a href="{{ route('area.index') }}">Area</a></li>
                            <li class=""><a href="{{ route('type.index') }}">Type</a></li>
                            <li class=""><a href="{{ route('process.index') }}">Process</a></li>
                            <li class=""><a href="{{ route('tonage.index') }}">Tonage</a></li>
                            <li class=""><a href="{{ route('machine.index') }}">Machine</a></li>
                            <li><a href="{{ route('setting.product.index') }}">Product</a></li>
                            <li><a href="{{ route('setting.supplier.index') }}">Supplier</a></li>
                            <li><a href="{{ route('setting.customer.index') }}">Customer</a></li>
                            <li><a href="{{ route('setting.category.index') }}">Category</a></li>
                            <li><a href="{{ route('setting.unit.index') }}">Unit</a></li>
                            <li><a href="{{ route('setting.type_of_product.index') }}">Type of Product</a></li>
                        </ul>
                    </li>
                    <h5 class="m-0 ps-4 py-2 bg-primary">ERP</h5>
                    <li>
                        <a class="has-arrow" href="javascript:void(0);" aria-expanded="false">
                            <i class=""></i> 
                            <span class="nav-text">BD</span>
                        </a>
                        <ul aria-expanded="false">
                            <li class=""><a href="{{route('ERP.bd.quotation.index')}}">Quotation</a></li>
                            <li class=""><a href="">Order</a></li>
                            <li class=""><a href="">Sales Price</a></li>
                            <li class=""><a href="">Invoice</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow" href="javascript:void(0);" aria-expanded="false">
                            <i class=""></i> 
                            <span class="nav-text">PVD</span>
                        </a>
                        <ul aria-expanded="false">
                            <li class=""><a href="{{route('pvd.purchase-price.index')}}">Purchase Price</a></li>
                            <li class=""><a href="">Purchase Planning</a></li>
                            <li class=""><a href="">Purchase Requisition</a></li>
                            <li class=""><a href="">Purchase Order</a></li>
                            <li class=""><a href="">Purchase Ranking List</a></li>
                        </ul>
                    </li>
                    <h5 class="m-0 ps-4 py-2 bg-primary">MES</h5>
                    <li>
                        <a class="has-arrow" href="javascript:void(0);" aria-expanded="false">
                            <i class=""></i> 
                            <span class="nav-text">Dashboard</span>
                        </a>
                        <ul aria-expanded="false">
                            <li class=""><a href="">Machine Status</a></li>
                            <li class=""><a href="">Shopfloor</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow" href="javascript:void(0);" aria-expanded="false">
                            <i class=""></i> 
                            <span class="nav-text">Engineering</span>
                        </a>
                        <ul aria-expanded="false">
                            <li class=""><a href="">BOM</a></li>
                            <li class=""><a href="">BOM Report</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow" href="javascript:void(0);" aria-expanded="false">
                            <i class=""></i> 
                            <span class="nav-text">PPC</span>
                        </a>
                        <ul aria-expanded="false">
                            <li class=""><a href="">Monthly Production Planning</a></li>
                            <li class=""><a href="">Daily Production Planning</a></li>
                            <li class=""><a href="">Scheduling</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow" href="javascript:void(0);" aria-expanded="false">
                            <i class=""></i> 
                            <span class="nav-text">Production</span>
                        </a>
                        <ul aria-expanded="false">
                            <li class=""><a href="">Monthly Production Output</a></li>
                            <li class=""><a href="">Summary Report</a></li>
                            <li class=""><a href="">Call for Assistance</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow" href="javascript:void(0);" aria-expanded="false">
                            <i class=""></i> 
                            <span class="nav-text">OEE</span>
                        </a>
                        <ul aria-expanded="false">
                            <li class=""><a href="">OEE Report</a></li>
                        </ul>
                    </li>
                    <h5 class="m-0 ps-4 py-2 bg-primary">WMS</h5>
                    <li>
                        <a class="has-arrow" href="javascript:void(0);" aria-expanded="false">
                            <i class=""></i> 
                            <span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="content-body default-height">
            <!-- Content starts here -->
            <div class="container m-0">
                <div class="row">
                    <div class="col-xl-12">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close btn btn-primary" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        @if ($errors && count($errors) > 0)
                            <div class="alert alert-danger" role="alert">
                                @foreach ($errors->all() as $error)
                                    <ul>
                                        <li>{{ $loop->iteration }} : {!! $error !!}</li>
                                    </ul>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="{{ asset('assets/js/plugins/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('vendor/fullcalendar/js/main.min.js') }}"></script>
    <script src="{{ asset('vendor/moment/moment.min.js') }}"></script>
    <script src="{{ asset('js/plugins-init/calendar.js') }}"></script>
    <script src="{{ asset('js/custom.min.js') }}"></script>
    <script src="{{ asset('js/dlabnav-init.js') }}"></script>
    <script src="{{ asset('js/demo.js') }}"></script>
    <script src="{{ asset('js/styleSwitcher.js') }}"></script>
    <script src="{{ asset('//cdn.datatables.net/2.2.1/js/dataTables.min.js') }}"></script>
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/sweetalert2@11') }}"></script>
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    @stack('scripts')
</body>

</html>
