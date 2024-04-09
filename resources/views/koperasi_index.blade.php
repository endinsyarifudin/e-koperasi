@php
    $html_tag_data = ['scrollspy' => 'true'];
    $title = $title;
    $description = 'Data Jenis Rekening';
    $breadcrumbs = [];
@endphp
@extends('layout', ['html_tag_data' => $html_tag_data, 'title' => $title, 'description' => $description])

@section('css')
    <link rel="stylesheet" href="/css/vendor/datatables.min.css" />
@endsection

@section('js_vendor')
    <script src="/js/cs/scrollspy.js"></script>
    <script src="/js/vendor/datatables.min.js"></script>
@endsection

@section('js_page')
    <script src="/js/cs/datatable.extend.js"></script>
    <script src="/js/data/data.rekening.js"></script>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="page-title-container">
                    <div class="row">
                        <!-- Title Start -->
                        <div class="col-12 col-md-7">
                            <h3 class="mb-0 pb-0 display-4" id="title">{{ $title }}</h3>
                            @include('_layout.breadcrumb', ['breadcrumbs' => $breadcrumbs])
                        </div>
                        <!-- Title End -->

                        <!-- Top Buttons Start -->
                        <div class="col-12 col-md-5 d-flex align-items-start justify-content-end">
                            <!-- Add New Button Start -->
                            <a href="{{ route('koperasi.edit', auth()->user()->koperasi->id) }}"
                                class="btn btn-outline-primary btn-icon btn-icon-start w-100 w-md-auto">
                                <i data-acorn-icon="plus"></i>
                                <span>Ubah Data</span>
                            </a>

                            <!-- Add New Button End -->

                        </div>
                        <!-- Top Buttons End -->
                    </div>
                </div>
                <!-- Title and Top Buttons End -->

                <!-- Content Start -->
                <div>
                    <!-- Stripe Start -->
                    <section class="scroll-section" id="stripe">
                        <div class="card mb-5">
                            <div class="card-body">
                                <!-- Stripe Controls Start -->
                                <div class="row">
                                    <div class="col-12 col-sm-5 col-lg-3 col-xxl-2 mb-1">
                                    </div>
                                    <div class="col-12 col-sm-7 col-lg-9 col-xxl-10 text-end mb-1">
                                    </div>
                                </div>
                                <!-- Stripe Controls End -->

                                <!-- Stripe Table Start -->
                                <div class="card-body">
                                    {!! Form::model($koperasi, [
                                        'method' => 'GET',
                                        'route' => 'koperasi.index',
                                    ]) !!}
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama Koperasi</label>
                                        {!! Form::text('nama', null, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                                        <span class="text-danger">{!! $errors->first('nama') !!}</span>
                                    </div>
                                    <div class="mb-3">
                                        <label for="alamat" class="form-label">Alamat Koperasi</label>
                                        {!! Form::text('alamat', null, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                                        <span class="text-danger">{!! $errors->first('alamat') !!}</span>
                                    </div>
                                    <div class="mb-3">
                                        <label for="telp" class="form-label">No. Telp/ No. HP Pengurus</label>
                                        {!! Form::text('telp', null, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                                        <span class="text-danger">{!! $errors->first('telp') !!}</span>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Alamat Email</label>
                                        {!! Form::text('email', null, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                                        <span class="text-danger">{!! $errors->first('email') !!}</span>
                                    </div>

                                    {!! Form::close() !!}
                                </div>
                                <!-- Stripe Table End -->
                            </div>
                        </div>
                    </section>
                    <!-- Stripe End -->
                </div>
                <!-- Content End -->
            </div>
        </div>
    </div>
@endsection
