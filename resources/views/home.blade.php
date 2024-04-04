@php
    $html_tag_data = ['scrollspy' => 'true'];
    $title = 'Data Kas';
    $description = 'Datatable responsive boxed variations with search.';
    $breadcrumbs = [
        '/' => 'Home',
        '/Interface' => 'Interface',
        '/Interface/Plugins' => 'Plugins',
        '/Interface/Plugins/Datatables' => 'Datatables',
    ];
@endphp
@extends('layout', ['html_tag_data' => $html_tag_data, 'title' => $title, 'description' => $description])

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/vendor/datatables.min.css') }}" />
@endsection

@section('js_vendor')
    <script src="{{ asset('/js/vendor/bootstrap-submenu.js') }}"></script>
    <script src="{{ asset('/js/vendor/datatables.min.js') }}"></script>
    <script src="{{ asset('/js/vendor/mousetrap.min.js') }}"></script>
@endsection

@section('js_page')
    <script src="{{ asset('/js/cs/datatable.extend.js') }}"></script>
    <script src="{{ asset('/js/data/editableboxed_kas.js') }}"></script>
@endsection
@section('content')
    <h1 class="h3 mb-3">Beranda E-Koperasi</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Selamat Datang {{ auth()->user()->name }} </h5>
                </div>
                <div class="card-body">
                    <div class="alert alert-warning">
                        Contoh sahaja..!
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
