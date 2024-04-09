{{-- @extends('layouts.app_adminkit') --}}
@php
    $html_tag_data = ['override' => '{"attributes" : { "layout": "boxed" }}'];
    $title = $title;
    // $heading = 'Blaine Cottrell';
    $description = 'Standard Profile Page';
    $breadcrumbs = ['/' => 'Home', '/Pages' => 'Pages', '/Pages/Profile' => 'Profile'];
@endphp
@extends('layout', ['html_tag_data' => $html_tag_data, 'title' => $title, 'description' => $description])

@section('css')
@endsection

@section('js_vendor')
    {{-- <script src="/js/vendor/Chart.bundle.min.js"></script> --}}
@endsection

@section('js_page')
    {{-- <script src="/js/cs/charts.extend.js"></script>
    <script src="/js/pages/profile.standard.js"></script> --}}
@endsection

@section('content')
    <!-- Title and Top Buttons Start -->
    <div class="page-title-container">
        <div class="row">
            <div class="col-12 col-md-7">
                <h1 class="mb-0 pb-0 display-4" id="title">{{ $title }}</h1>
                {{-- @include('_layout.breadcrumb', ['breadcrumbs' => $breadcrumbs]) --}}
            </div>
            <div class="col-12 col-md-5 d-flex align-items-start justify-content-end">
                <h2 class="small-title">Halo {{ auth()->user()->name }}, silahkan ubah profil anda... </h2>
            </div>
        </div>
    </div>
    <!-- Title and Top Buttons End -->

    <div class="row">
        <div class="col-12 col-xl-12 col-xxl-3">

            <div class="card">
                <div class="card-body mb-n5">
                    <div class="d-flex align-items-center flex-column mb-3">
                        <div class="mb-4 d-flex align-items-center flex-column">
                            <div class="sw-13 position-relative mb-3">
                                <img src="/img/profile/profile-2.webp" class="img-fluid rounded-xl" alt="thumb" />
                            </div>
                            <div class="h5 mb-0 text-uppercase"> {{ Auth::user()->name }}</div>
                            <div class="text-muted">{{ Auth::user()->role }}</div>
                            <div class="text-muted">
                                <i data-acorn-icon="pin" class="me-1"></i>
                                <span class="align-middle">Montreal, Canada</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        {!! Form::model(auth()->user(), [
                            'route' => ['userprofile.update', $user->id],
                            'method' => 'PUT',
                        ]) !!}

                        <div class="mb-3 row align-items-center">
                            <label for="name" class="col-sm-2 col-form-label">Nama User</label>
                            <div class="col-sm-10">
                                {!! Form::text('name', null, ['class' => 'form-control']) !!}
                                <span class="text-danger">{!! $errors->first('name') !!}</span>
                            </div>
                        </div>
                        <div class="mb-3 row align-items-center">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                {!! Form::text('email', null, ['class' => 'form-control']) !!}
                                <span class="text-danger">{!! $errors->first('email') !!}</span>
                            </div>
                        </div>
                        <div class="mb-3 row align-items-center">
                            <label for="nohp" class="col-sm-2 col-form-label">No. Kontak</label>
                            <div class="col-sm-10">
                                {!! Form::text('nohp', null, ['class' => 'form-control']) !!}
                                <span class="text-danger">{!! $errors->first('nohp') !!}</span>
                            </div>
                        </div>
                        <div class="mb-3 row align-items-center">
                            <label for="password" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                {!! Form::password('password', ['class' => 'form-control']) !!}
                                <span class="text-danger">{!! $errors->first('password') !!}</span>
                            </div>
                        </div>
                        {!! Form::submit('simpan', ['class' => 'btn btn-primary btn-sm']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    @endsection
