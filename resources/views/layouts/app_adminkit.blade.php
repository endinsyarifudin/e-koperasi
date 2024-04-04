<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
        <meta name="author" content="AdminKit">
        <meta name="keywords"
            content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link rel="shortcut icon" href="img/icons/icon-48x48.png" />

        {{-- <link rel="canonical" href="https://demo-basic.adminkit.io/pages-blank.html" /> --}}

        <title>{{ $title ?? '' }}| e-Koperasi</title>
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('adminkit/css/app.css') }}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    </head>

    <body>
        <div class="wrapper">
            <nav id="sidebar" class="sidebar js-sidebar">
                <div class="sidebar-content js-simplebar">
                    <a class="sidebar-brand" href="index.html">
                        <span class="align-middle">AdminKit</span>
                    </a>

                    <ul class="sidebar-nav">
                        <li class="sidebar-header">
                            Menu Utama
                        </li>

                        <li class="sidebar-item {{ Route::is('home') ? 'active' : '' }}">
                            <a class="sidebar-link" href="{{ route('home') }}">
                                <i class="align-middle" data-feather="sliders"></i> <span
                                    class="align-middle">Beranda</span>
                            </a>
                        </li>

                        <li class="sidebar-item {{ Route::is('koperasi.*') ? 'active' : '' }}">
                            <a class="sidebar-link" href="{{ route('koperasi.create') }}">
                                <i class="align-middle" data-feather="user"></i> <span class="align-middle">Data
                                    Koperasi</span>
                            </a>
                        </li>
                        <li class="sidebar-item {{ Route::is('kas.*') ? 'active' : '' }}">
                            <a class="sidebar-link" href="{{ route('kas.index') }}">
                                <i class="align-middle" data-feather="user"></i> <span class="align-middle">Kas
                                    Koperasi</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="pages-sign-in.html">
                                <i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Sign
                                    In</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="pages-sign-up.html">
                                <i class="align-middle" data-feather="user-plus"></i> <span class="align-middle">Sign
                                    Up</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="pages-blank.html">
                                <i class="align-middle" data-feather="book"></i> <span class="align-middle">Blank</span>
                            </a>
                        </li>

                        <li class="sidebar-header">
                            Tools & Components
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="ui-buttons.html">
                                <i class="align-middle" data-feather="square"></i> <span
                                    class="align-middle">Buttons</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="ui-forms.html">
                                <i class="align-middle" data-feather="check-square"></i> <span
                                    class="align-middle">Forms</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="ui-cards.html">
                                <i class="align-middle" data-feather="grid"></i> <span class="align-middle">Cards</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="ui-typography.html">
                                <i class="align-middle" data-feather="align-left"></i> <span
                                    class="align-middle">Typography</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="icons-feather.html">
                                <i class="align-middle" data-feather="coffee"></i> <span
                                    class="align-middle">Icons</span>
                            </a>
                        </li>

                        <li class="sidebar-header">
                            Plugins & Addons
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="charts-chartjs.html">
                                <i class="align-middle" data-feather="bar-chart-2"></i> <span
                                    class="align-middle">Charts</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="maps-google.html">
                                <i class="align-middle" data-feather="map"></i> <span
                                    class="align-middle">Maps</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="main">
                <nav class="navbar navbar-expand navbar-light navbar-bg">
                    <a class="sidebar-toggle js-sidebar-toggle">
                        <i class="hamburger align-self-center"></i>
                    </a>

                    <div class="navbar-collapse collapse">
                        <ul class="navbar-nav ">
                            <li class="nav-item dropdown">
                                <h4 class="ml-2 fw-bold">{{ auth()->user()->koperasi->nama }}</h4>
                            </li>
                        </ul>
                        <ul class="navbar-nav navbar-align">
                            <li class="nav-item dropdown">
                                <a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown"
                                    data-bs-toggle="dropdown">
                                    <div class="position-relative">
                                        <i class="align-middle" data-feather="bell"></i>
                                        <span class="indicator">4</span>
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0"
                                    aria-labelledby="alertsDropdown">
                                    <div class="dropdown-menu-header">
                                        4 New Notifications
                                    </div>
                                    <div class="list-group">
                                        <a href="#" class="list-group-item">
                                            <div class="row g-0 align-items-center">
                                                <div class="col-2">
                                                    <i class="text-danger" data-feather="alert-circle"></i>
                                                </div>
                                                <div class="col-10">
                                                    <div class="text-dark">Update completed</div>
                                                    <div class="text-muted small mt-1">Restart server 12 to complete
                                                        the update.</div>
                                                    <div class="text-muted small mt-1">30m ago</div>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <div class="row g-0 align-items-center">
                                                <div class="col-2">
                                                    <i class="text-warning" data-feather="bell"></i>
                                                </div>
                                                <div class="col-10">
                                                    <div class="text-dark">Lorem ipsum</div>
                                                    <div class="text-muted small mt-1">Aliquam ex eros, imperdiet
                                                        vulputate hendrerit et.</div>
                                                    <div class="text-muted small mt-1">2h ago</div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="dropdown-menu-footer">
                                        <a href="#" class="text-muted">Show all notifications</a>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-icon dropdown-toggle" href="#" id="messagesDropdown"
                                    data-bs-toggle="dropdown">
                                    <div class="position-relative">
                                        <i class="align-middle" data-feather="message-square"></i>
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0"
                                    aria-labelledby="messagesDropdown">
                                    <div class="dropdown-menu-header">
                                        <div class="position-relative">
                                            1 New Messages
                                        </div>
                                    </div>
                                    <div class="list-group">
                                        <a href="#" class="list-group-item">
                                            <div class="row g-0 align-items-center">
                                                <div class="col-2">
                                                    <img src="img/avatars/avatar-5.jpg"
                                                        class="avatar img-fluid rounded-circle" alt="Vanessa Tucker">
                                                </div>
                                                <div class="col-10 ps-2">
                                                    <div class="text-dark">Vanessa Tucker</div>
                                                    <div class="text-muted small mt-1">Nam pretium turpis et arcu. Duis
                                                        arcu tortor.</div>
                                                    <div class="text-muted small mt-1">15m ago</div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="dropdown-menu-footer">
                                        <a href="#" class="text-muted">Show all messages</a>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#"
                                    data-bs-toggle="dropdown">
                                    <i class="align-middle" data-feather="settings"></i>
                                </a>

                                <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#"
                                    data-bs-toggle="dropdown">
                                    <img src="{{ asset('images/avatars/avatar-5.jpg') }}"
                                        class="avatar img-fluid rounded me-1" alt="{{ auth()->user()->name }}" />
                                    <span class="text-dark">{{ auth()->user()->name }}</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="{{ route('userprofil.edit', 0) }}"><i
                                            class="align-middle me-1" data-feather="user"></i> Profile</a>
                                    <a class="dropdown-item" href="#"><i class="align-middle me-1"
                                            data-feather="pie-chart"></i> Analytics</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout-user') }}">Log out</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>

                <main class="content">
                    <div class="container-fluid p-0">
                        @include('flash::message')

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @yield('content')
                    </div>
                </main>

                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row text-muted">
                            <div class="col-6 text-start">
                                <p class="mb-0">
                                    <a class="text-muted" href="tfc.darululumciracap.com"
                                        target="_blank">e-Koperasi</a> - <a class="text-muted"
                                        href="tfc.darululumciracap.com" target="_blank"></a>
                                    &copy;{{ date('Y') }}
                                </p>
                            </div>
                            <div class="col-6 text-end">

                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

        <script src="{{ asset('/adminkit/js/app.js') }}"></script>

    </body>

</html>
s