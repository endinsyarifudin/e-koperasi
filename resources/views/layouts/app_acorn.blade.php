<!DOCTYPE html>
<html lang="en" data-footer="true">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <title>Acorn Admin Template | Pages</title>
        <meta name="description"
            content="Layouts that are focused on different project needs. Contains html blocks and specific plugins that are fit for the context." />
        <!-- Favicon Tags Start -->
        <link rel="apple-touch-icon-precomposed" sizes="57x57"
            href="{{ asset('acorn/img/favicon/apple-touch-icon-57x57.png') }}" />
        <link rel="apple-touch-icon-precomposed" sizes="114x114"
            href="{{ asset('acorn/img/favicon/apple-touch-icon-114x114.png') }}" />
        <link rel="apple-touch-icon-precomposed" sizes="72x72"
            href="{{ asset('acorn/img/favicon/apple-touch-icon-72x72.png') }}" />
        <link rel="apple-touch-icon-precomposed" sizes="144x144"
            href="{{ asset('acorn/img/favicon/apple-touch-icon-144x144.png') }}" />
        <link rel="apple-touch-icon-precomposed" sizes="60x60"
            href="{{ asset('acorn/img/favicon/apple-touch-icon-60x60.png') }}" />
        <link rel="apple-touch-icon-precomposed" sizes="120x120"
            href="{{ asset('acorn/img/favicon/apple-touch-icon-120x120.png') }}" />
        <link rel="apple-touch-icon-precomposed" sizes="76x76"
            href="{{ asset('acorn/img/favicon/apple-touch-icon-76x76.png') }}" />
        <link rel="apple-touch-icon-precomposed" sizes="152x152"
            href="{{ asset('acorn/img/favicon/apple-touch-icon-152x152.png') }}" />
        <link rel="icon" type="image/png" href="{{ asset('acorn/img/favicon/favicon-196x196.png') }}"
            sizes="196x196" />
        <link rel="icon" type="image/png" href="{{ asset('acorn/img/favicon/favicon-96x96.png') }}"
            sizes="96x96" />
        <link rel="icon" type="image/png" href="{{ asset('acorn/img/favicon/favicon-32x32.png') }}"
            sizes="32x32" />
        <link rel="icon" type="image/png" href="{{ asset('acorn/img/favicon/favicon-16x16.png') }}"
            sizes="16x16" />
        <link rel="icon" type="image/png" href="{{ asset('acorn/img/favicon/favicon-128.png') }}"
            sizes="128x128" />
        <meta name="application-name" content="&nbsp;" />
        <meta name="msapplication-TileColor" content="#FFFFFF" />
        <meta name="msapplication-TileImage" content="{{ asset('acorn/img/favicon/mstile-144x144.png') }}" />
        <meta name="msapplication-square70x70logo" content="{{ asset('acorn/img/favicon/mstile-70x70.png') }}" />
        <meta name="msapplication-square150x150logo" content="{{ asset('acorn/img/favicon/mstile-150x150.png') }}" />
        <meta name="msapplication-wide310x150logo" content="{{ asset('acorn/img/favicon/mstile-310x150.png') }}" />
        <meta name="msapplication-square310x310logo" content="{{ asset('acorn/img/favicon/mstile-310x310.png') }}" />
        <!-- Favicon Tags End -->
        <!-- Font Tags Start -->
        <link rel="preconnect" href="https://fonts.gstatic.com" />
        <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;700&display=swap"
            rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap"
            rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('acorn/font/CS-Interface/style.css') }}" />
        <!-- Font Tags End -->
        <!-- Vendor Styles Start -->
        <link rel="stylesheet" href="{{ asset('acorn/css/vendor/bootstrap.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('acorn/css/vendor/OverlayScrollbars.min.css') }}" />

        <!-- Vendor Styles End -->
        <!-- Template Base Styles Start -->
        <link rel="stylesheet" href="{{ asset('acorn/css/styles.css') }}" />
        <!-- Template Base Styles End -->

        <link rel="stylesheet" href="{{ asset('acorn/css/main.css') }}" />
        <script src="{{ asset('acorn/js/base/loader.js') }}"></script>
    </head>

    <body>
        <div id="root">
            <div id="nav" class="nav-container d-flex">
                @include('layouts.navbar_acorn')
            </div>

            <main>
                <div class="container">
                    @yield('content')
                </div>
            </main>
            @include('layouts.footer')
        </div>
        @include('layouts.modal_settings')

        <!-- Theme Settings & Niches Buttons Start -->
        <div class="settings-buttons-container">
            <button type="button" class="btn settings-button btn-primary p-0" data-bs-toggle="modal"
                data-bs-target="#settings" id="settingsButton">
                <span class="d-inline-block no-delay" data-bs-delay="0" data-bs-offset="0,3" data-bs-toggle="tooltip"
                    data-bs-placement="left" title="Settings">
                    <i data-acorn-icon="paint-roller" class="position-relative"></i>
                </span>
            </button>
        </div>
        <!-- Theme Settings & Niches Buttons End -->

        <!-- Vendor Scripts Start -->
        <script src="{{ asset('acorn/js/vendor/jquery-3.5.1.min.js') }}"></script>
        <script src="{{ asset('acorn/js/vendor/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('acorn/js/vendor/OverlayScrollbars.min.js') }}"></script>
        <script src="{{ asset('acorn/js/vendor/autoComplete.min.js') }}"></script>
        <script src="{{ asset('acorn/js/vendor/clamp.min.js') }}"></script>

        <script src="{{ asset('acorn/icon/acorn-icons.js') }}"></script>
        <script src="{{ asset('acorn/icon/acorn-icons-interface.js') }}"></script>

        <!-- Vendor Scripts End -->

        <!-- Template Base Scripts Start -->
        <script src="{{ asset('acorn/js/base/helpers.js') }}"></script>
        <script src="{{ asset('acorn/js/base/globals.js') }}"></script>
        <script src="{{ asset('acorn/js/base/nav.js') }}"></script>
        <script src="{{ asset('acorn/js/base/search.js') }}"></script>
        <script src="{{ asset('acorn/js/base/settings.js') }}"></script>
        <!-- Template Base Scripts End -->
        <!-- Page Specific Scripts Start -->

        <script src="{{ asset('acorn/js/common.js') }}"></script>
        <script src="{{ asset('acorn/js/scripts.js') }}"></script>
        <!-- Page Specific Scripts End -->
    </body>

</html>
