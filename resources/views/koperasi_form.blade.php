@php
    $html_tag_data = [];
    $title = $title;
    $description = '';
    $breadcrumbs = [];
@endphp
@extends('layout', ['html_tag_data' => $html_tag_data, 'title' => $title, 'description' => $description])

@section('css')
    <link rel="stylesheet" href="/css/vendor/datatables.min.css" />
@endsection

@section('js_vendor')
    <script src="/js/vendor/bootstrap-submenu.js"></script>
    {{-- <script src="/js/vendor/datatables.min.js"></script> --}}
    {{-- <script src="/js/vendor/mousetrap.min.js"></script> --}}
@endsection

@section('js_page')
    {{-- <script src="/js/cs/datatable.extend.js"></script>
    <script src="/js/data/kas.editableboxed.js"></script> --}}
@endsection

@section('content')
    <h1 class="h3 mb-3">Form E-Koperasi</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        Lengkapi Data Koperasi Anda </h5>
                </div>
                <div class="card-body">
                    {!! Form::model($koperasi, [
                        'method' => 'POST',
                        'route' => 'koperasi.store',
                    ]) !!}
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Koperasi</label>
                        {!! Form::text('nama', null, ['class' => 'form-control']) !!}
                        <span class="text-danger">{!! $errors->first('nama') !!}</span>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat Koperasi</label>
                        {!! Form::text('alamat', null, ['class' => 'form-control']) !!}
                        <span class="text-danger">{!! $errors->first('alamat') !!}</span>
                    </div>
                    <div class="mb-3">
                        <label for="telp" class="form-label">No. Telp/ No. HP Pengurus</label>
                        {!! Form::text('telp', null, ['class' => 'form-control']) !!}
                        <span class="text-danger">{!! $errors->first('telp') !!}</span>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Alamat Email</label>
                        {!! Form::text('email', null, ['class' => 'form-control']) !!}
                        <span class="text-danger">{!! $errors->first('email') !!}</span>
                    </div>
                    {!! Form::submit('simpan', ['class' => 'btn btn-primary btn-sm']) !!}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
