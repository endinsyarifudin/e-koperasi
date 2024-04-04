<!DOCTYPE html>
<html lang="en" data-footer="true">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <title>e-Koperasi | {{ $title }}</title>
        <meta name="description" content="{{ $description }}" />
        <!-- Favicon Tags Start -->
        @include('_layout.head')
    </head>

    <body>
        <div id="root">
            <div id="nav" class="nav-container d-flex">
                @include('_layout.nav')
                {{-- <div class="nav-shadow"></div> --}}
            </div>

            <main>
                {{-- <div id="response-ajax" class="alert text-center"></div> --}}
                @include('flash::message')
                @yield('content')
            </main>
            @include('_layout.footer')
        </div>
        @include('_layout.modal_settings')
        {{-- @include('_layout.modal_search') --}}

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
        @include('_layout.scripts')
    </body>

</html>
