<div class="nav-content d-flex">
    <!-- Logo Start -->
    <div class="logo position-relative">
        <a href="/">
            <!-- Logo can be added directly -->
            {{-- <img src="/img/logo/sismaya.svg" alt="logo" /> --}}
            <!-- Or added via css to provide different ones for different color themes -->
            <div class="img"></div>
        </a>
    </div>
    <!-- Logo End -->

    <!-- User Menu Start -->
    <div class="user-container d-flex">
        <a href="#" class="d-flex user position-relative" data-bs-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <img class="profile" alt="profile" src="/img/profile/profile-9.webp" />
            <div class="name">{{ auth()->user()->name }}</div>
        </a>
        <div class="dropdown-menu dropdown-menu-end user-menu wide">
            <div class="row mb-0 ms-0 me-0">
                <div class="col-6 ps-1 pe-1">
                    <ul class="list-unstyled">
                        <li>
                            <a href="{{ route('userprofile.index') }}">
                                <i data-acorn-icon="user" class="me-2" data-acorn-size="17"></i>
                                <span class="align-middle">User Info</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row mb-0 ms-0 me-0">
                <div class="col-12 p-1 mb-3 pt-3">
                    <div class="separator-light"></div>
                </div>
                <div class="col-6 pe-1 ps-1">
                    <ul class="list-unstyled">
                        <li>
                            <a href="{{ route('logout-user') }}">
                                <i data-acorn-icon="logout" class="me-2" data-acorn-size="17"></i>
                                <span class="align-middle">Logout</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- User Menu End -->

    <!-- Icons Menu Start -->
    <ul class="list-unstyled list-inline text-center menu-icons">
        <li class="list-inline-item">
            <a href="#" data-bs-toggle="modal" data-bs-target="#searchPagesModal">
                <i data-acorn-icon="search" data-acorn-size="18"></i>
            </a>
        </li>
        <li class="list-inline-item">
            <a href="#" id="pinButton" class="pin-button">
                <i data-acorn-icon="lock-on" class="unpin" data-acorn-size="18"></i>
                <i data-acorn-icon="lock-off" class="pin" data-acorn-size="18"></i>
            </a>
        </li>
        <li class="list-inline-item">
            <a href="#" id="colorButton">
                <i data-acorn-icon="light-on" class="light" data-acorn-size="18"></i>
                <i data-acorn-icon="light-off" class="dark" data-acorn-size="18"></i>
            </a>
        </li>
    </ul>
    <!-- Icons Menu End -->

    <!-- Menu Start -->
    <div class="menu-container flex-grow-1">
        <ul id="menu" class="menu">
            <li>
                <a href="{{ route('home') }}" data-href="{{ route('home') }}">
                    <i data-acorn-icon="home" class="icon" data-acorn-size="18"></i>
                    <span class="label">Dashboard</span>
                </a>
                <ul id="dashboards">
                    <li>
                        <a href="{{ route('home') }}">
                            <span class="label">Beranda</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('koperasi.index') }}">
                            <span class="label">Koperasi</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('kas.index') }}">
                            <span class="label">Neraca</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('kas2') }}">
                            <span class="label">Neraca R Web</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#pengguna" data-href="#pengguna">
                    <i data-acorn-icon="screen" class="icon" data-acorn-size="18"></i>
                    <span class="label">Pengguna</span>
                </a>
                <ul id="pengguna">
                    <li>
                        {{-- <a href="{{ route('admin.users') }}"> --}}
                        <span class="label">Data User</span>
                        </a>
                    </li>
                    <li>
                        <a href="/Apps/Chat">
                            <span class="label">Chat</span>
                        </a>
                    </li>
                    <li>
                        <a href="/Apps/Contacts">
                            <span class="label">Contacts</span>
                        </a>
                    </li>
                    <li>
                        <a href="/Apps/Mailbox">
                            <span class="label">Mailbox</span>
                        </a>
                    </li>
                    <li>
                        <a href="/Apps/Tasks">
                            <span class="label">Tasks</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#pages" data-href="/Pages">
                    <i data-acorn-icon="notebook-1" class="icon" data-acorn-size="18"></i>
                    <span class="label">MASTER</span>
                </a>
                <ul id="pages">
                    <li>
                        <a href="{{ route('jenisneraca.index') }}">
                            <span class="label">Akun Neraca</span>
                        </a>
                        <ul id="authentication">
                            <li>
                                <a href="{{ route('jenisneraca.index') }}">
                                    <span class="label">Jenis Neraca</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('itemneraca.index') }}">
                                    <span class="label">Item Neraca</span>
                                </a>
                            </li>
                            {{-- <li>
                                <a href="/Pages/Authentication/ForgotPassword">
                                    <span class="label">Forgot Password</span>
                                </a>
                            </li>
                            <li>
                                <a href="/Pages/Authentication/ResetPassword">
                                    <span class="label">Reset Password</span>
                                </a>
                            </li> --}}
                        </ul>
                    </li>
                    <li>
                        <a href="#blog" data-href="/jenislabarugi/index">
                            <span class="label">Akun Laba Rugi</span>
                        </a>
                        <ul id="blog">
                            <li>
                                <a href="{{ route('jenislabarugi.index') }}">
                                    <span class="label">Jenis Laba Rugi</span>
                                </a>
                            </li>
                            <li>
                                <a href="/Pages/Blog/Grid">
                                    <span class="label">Grid</span>
                                </a>
                            </li>
                            <li>
                                <a href="/Pages/Blog/List">
                                    <span class="label">List</span>
                                </a>
                            </li>
                            <li>
                                <a href="/Pages/Blog/Detail">
                                    <span class="label">Detail</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#rekening" data-href="{{ route('rekening.index') }}">
                            <span class="label">Rekening & Kas</span>
                        </a>
                        <ul id="miscellaneous">
                            <li>
                                <a href="{{ route('rekening.index') }}">
                                    <span class="label">Data Rekening</span>
                                </a>
                            </li>
                            <li>
                                <a href="/Pages/Miscellaneous/KnowledgeBase">
                                    <span class="label">Knowledge Base</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#portfolio" data-href="/Pages/Portfolio">
                            <span class="label">Portfolio</span>
                        </a>
                        <ul id="portfolio">
                            <li>
                                <a href="/Pages/Portfolio/Home">
                                    <span class="label">Home</span>
                                </a>
                            </li>
                            <li>
                                <a href="/Pages/Portfolio/Detail">
                                    <span class="label">Detail</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
        </li>
        </ul>
    </div>
    <!-- Menu End -->

    <!-- Mobile Buttons Start -->
    <div class="mobile-buttons-container">
        <a href="#" id="scrollSpyButton" class="spy-button" data-bs-toggle="dropdown">
            <i data-acorn-icon="menu-dropdown"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-end" id="scrollSpyDropdown"></div>
        <a href="#" id="mobileMenuButton" class="menu-button">
            <i data-acorn-icon="menu"></i>
        </a>
    </div>
    <!-- Mobile Buttons End -->
</div>
<div class="nav-shadow"></div>
