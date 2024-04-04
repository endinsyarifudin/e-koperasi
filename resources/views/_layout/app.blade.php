<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    </head>

    <body>
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        @auth
                            <ul class="navbar-nav me-auto">
                                <li class="nav-item">
                                    {{-- <a class="nav-link" href="{{ route('siswa.create') }}">Tambah Siswa</a> --}}
                                </li>
                                <li class="nav-item">
                                    {{-- <a class="nav-link" href="{{ route('siswa.index') }}">Data Siswa</a> --}}
                                </li>
                                <li class="nav-item">
                                    {{-- <a class="nav-link" href="{{ route('users.create') }}">Tambah user</a> --}}
                                </li>
                                <li class="nav-item">
                                    {{-- <a class="nav-link" href="{{ route('users.index') }}">Data User</a> --}}
                                </li>
                            </ul>
                        @endauth

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">
                            <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>

            <main class="py-4">
                {{-- <div id="response-ajax" class="alert text-center"></div> --}}
                {{-- @include('flash::message') --}}
                @yield('content')
            </main>
        </div>
        {{-- <script src="//code.jquery.com/jquery.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

        <script>
            $('#flash-overlay-modal').modal();
        </script> --}}
        {{-- <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script>
            $(document).ready(function() {
                $('#form-ajax').submit(function(e) {
                    $('#response-ajax').html('');
                    e.preventDefault();
                    var form = $(this);
                    var url = form.attr('action');
                    var method = form.attr('method');
                    var data = form.serialize();
                    $.ajax({
                        type: method,
                        url: url,
                        data: data,
                        success: function(response) {
                            $('#response-ajax').removeClass('alert-danger');
                            $('#response-ajax').addClass('alert-success');
                            $('#response-ajax').html(response.message);
                        },
                        error: function(xhr, status, error) {
                            $('#response-ajax').removeClass('alert-success');
                            $('#response-ajax').addClass('alert-danger');
                            var responseJson = JSON.parse(xhr.responseText);
                            var message = responseJson.message;
                            var errors = responseJson.errors;
                            $('#response-ajax').html(message);
                            $.each(errors, function(key, value) {
                                //find by name
                                var element = $('[name="' + key + '"]');
                                element.addClass('is-invalid');
                                element.next().html(' <span class = "text-danger" > ' +
                                    value + ' </span>');
                            });
                        }
                    });
                });
            });
        </script> --}}
    </body>

</html>
