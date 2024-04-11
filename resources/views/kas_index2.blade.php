@php
    $html_tag_data = [];
    $title = $title;
    $description =
        'A table enhancing plug-in for the jQuery Javascript library, adding sorting, paging and filtering abilities to plain HTML tables with minimal effort.';
    $breadcrumbs = [
        '/' => 'Home',
        '/Interface' => 'Interface',
        '/Interface/Plugins' => 'Plugins',
        '/Interface/Plugins/Datatables' => 'Datatables',
    ];
@endphp
@extends('layout', ['html_tag_data' => $html_tag_data, 'title' => $title, 'description' => $description])

@section('css')
    {{-- <link rel="stylesheet" href="/css/vendor/datatables.min.css" /> --}}
@endsection

@section('js_vendor')
    {{-- <script src="/js/vendor/bootstrap-submenu.js"></script>
    <script src="/js/vendor/datatables.min.js"></script>
    <script src="/js/vendor/mousetrap.min.js"></script> --}}
@endsection

@section('js_page')
    {{-- <script src="/js/cs/datatable.extend.js"></script> --}}
    {{-- <script src="/js/data/kas.editableboxed.js"></script> --}}
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
                            <h5>{{ Auth::user()->koperasi->nama }}</h5>
                            {{-- @include('_layout.breadcrumb', ['breadcrumbs' => $breadcrumbs]) --}}
                        </div>
                        <!-- Title End -->

                        <!-- Top Buttons Start -->
                        <div class="col-12 col-md-5 d-flex align-items-start justify-content-end">
                            <!-- Add New Button Start -->
                            <a href="{{ route('kas.create') }}"
                                class="btn btn-outline-primary btn-icon btn-icon-start w-100 w-md-auto">
                                <i data-acorn-icon="plus"></i>
                                <span>Tambah Data</span>
                            </a>

                            <!-- Add New Button End -->

                        </div>
                        <!-- Top Buttons End -->
                    </div>
                </div>

                <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">No</th>
                            <th scope="col" class="text-center">Tanggal</th>
                            <th scope="col" class="text-center">uraian</th>
                            <th scope="col" class="text-center">Jenis</th>
                            <th scope="col" class="text-center">Kredit</th>
                            <th scope="col" class="text-center">Debet</th>
                            <th scope="col" class="text-center">Saldo</th>
                            <th scope="col" class="text-center">Diinput oleh</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kas as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->tanggal->translatedFormat('d/m/Y') }}</td>
                                <td>{{ $item->uraian }}</td>
                                <td>{{ $item->jenis_id }}</td>
                                <td class="text-end">
                                    {{ $item->kategori == 'pendapatan' ? formatRupiah($item->jumlah) : '' }}
                                </td>
                                <td class="text-end">
                                    {{ $item->kategori == 'pengeluaran' ? formatRupiah($item->jumlah) : '' }}
                                </td>
                                <td class="text-end">{{ formatRupiah($item->saldo_akhir) }}</td>
                                <td class="text-center">{{ $item->createdBy->name }}</td>
                                <td>
                                    <a href="{{ route('kas.show', $item->id) }}" class="btn btn-info btn-sm">dtl</a>
                                    <a href="{{ route('kas.edit', $item->id) }}" class="btn btn-primary btn-sm">edt</a>
                                    <form action="{{ route('kas.destroy', $item->id) }}" method="POST"
                                        style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">hps</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
