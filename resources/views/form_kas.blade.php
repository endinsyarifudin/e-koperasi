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
    <link rel="stylesheet" href="/css/vendor/datatables.min.css" />
@endsection

@section('js_vendor')
    <script src="/js/vendor/bootstrap-submenu.js"></script>
    <script src="/js/vendor/datatables.min.js"></script>
    <script src="/js/vendor/mousetrap.min.js"></script>
@endsection

@section('js_page')
    <script src="/js/cs/datatable.extend.js"></script>
    <script src="/js/data/kas.editableboxed.js"></script>
@endsection
@section('content')
    <h3 class="h3 mb-3">Form Transaksi</h3>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header align-items-end">
                    <h5 class="card-title mb-0">Saldo Akhir saat ini: {{ formatRupiah($saldoAkhir) }}</h5>
                </div>
                <div class="card-body">
                    {!! Form::model($kas, [
                        'route' => isset($kas->id) ? ['kas.update', $kas->id] : 'kas.store',
                        'method' => isset($kas->id) ? 'PUT' : 'POST',
                    ]) !!}

                    <div class="form-group mb-3">
                        {!! Form::label('tanggal', 'Tanggal') !!}
                        {!! Form::date('tanggal', $kas->tanggal ?? now(), ['class' => 'form-control']) !!}
                        <span class="text-danger">{{ $errors->first('tanggal') }}</span>
                    </div>
                    <div class="form-group mb-3 ">
                        {!! Form::label('jenis', 'Kategori') !!}
                        <div class="form-check mt-2">
                            {!! Form::radio('jenis', 'pendapatan', true, ['class' => 'form-check-input', 'id' => 'pendapatan']) !!}
                            {!! Form::label('pendapatan', 'Pengeluaran', ['class' => 'form-check-label']) !!}
                        </div>
                        <div class="form-check">
                            {!! Form::radio('jenis', 'pengeluaran', false, ['class' => 'form-check-input', 'id' => 'pengeluaran']) !!}
                            {!! Form::label('pengeluaran', 'Pendapatan', ['class' => 'form-check-label']) !!}
                        </div>
                        <span class="text-danger">{{ $errors->first('jenis') }}</span>
                    </div>

                    <div class="form-group mb-3">
                        {!! Form::label('kategori', 'Kategori') !!}
                        {!! Form::text('kategori', null, ['class' => 'form-control', 'placeholder' => 'Masukkan Kategori']) !!}
                        <span class="text-danger">{{ $errors->first('kategori') }}</span>
                    </div>

                    <div class="form-group mb-3">
                        {!! Form::label('keterangan', 'Keterangan') !!}
                        {!! Form::text('keterangan', null, ['class' => 'form-control', 'placeholder' => 'Masukkan Keterangan']) !!}
                        <span class="text-danger">{{ $errors->first('keterangan') }}</span>
                    </div>

                    <div class="form-group mb-3">
                        {!! Form::label('jumlah', 'Jumlah Transaksi') !!}
                        {!! Form::number('jumlah', null, ['class' => 'form-control', 'placeholder' => 'Masukkan Jumlah']) !!}
                        <span class="text-danger">{{ $errors->first('jumlah') }}</span>
                    </div>

                    <div class="form-group mb-3">
                        {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
                        <a href="{{ route('kas.index') }}" class="btn btn-secondary">Batal</a>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
