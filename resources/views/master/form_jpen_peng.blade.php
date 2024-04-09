@php
    $html_tag_data = ['scrollspy' => 'true'];
    $title = $title;
    $description = 'Data Jenis Pendapatan dan Pengeluaran';
    $breadcrumbs = [];
@endphp
@extends('layout', ['html_tag_data' => $html_tag_data, 'title' => $title, 'description' => $description])

@section('css')
    <link rel="stylesheet" href="/css/vendor/datatables.min.css" />
@endsection

@section('js_vendor')
    {{-- <script src="/js/cs/scrollspy.js"></script>
    <script src="/js/vendor/datatables.min.js"></script> --}}
@endsection

@section('js_page')
    {{-- <script src="/js/cs/datatable.extend.js"></script>
    <script src="/js/data/data.jenis.js"></script> --}}
@endsection

@section('content')
    <h4 class="h4 mb-3">Form Jenis Pendapatan / Pengeluaran</h4>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    {!! Form::model($jenis, [
                        'route' => isset($jenis->id) ? ['jenis.update', $jenis->id] : 'jenis.store',
                        'method' => isset($jenis->id) ? 'PUT' : 'POST',
                    ]) !!}

                    <div class="form-group mb-3">
                        {!! Form::label('kategori', 'Kategori') !!}
                        {!! Form::select(
                            'kategori',
                            ['' => 'Pilih Kategori', 'pendapatan' => 'Pendapatan', 'pengeluaran' => 'Pengeluaran'],
                            null,
                            ['class' => 'form-control mt-1', 'id' => 'kategori'],
                        ) !!}
                        <span class="text-danger">{{ $errors->first('kategori') }}</span>
                    </div>

                    <div class="form-group mb-3">
                        {!! Form::label('name', 'Jenis Pendapatan / Pengeluaran') !!}
                        {!! Form::text('name', null, [
                            'class' => 'form-control mt-1',
                        ]) !!}
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    </div>

                    <div class="form-group mb-3">
                        {!! Form::label('deskripsi', 'Deskripsi') !!}
                        {!! Form::text('deskripsi', null, [
                            'class' => 'form-control mt-1',
                        ]) !!}
                        <span class="text-danger">{{ $errors->first('deskripsi') }}</span>
                    </div>

                    <div class="form-group mb-3">
                        {!! Form::submit('Simpan', ['class' => 'btn btn-outline-primary btn-sm']) !!}
                        <a href="{{ route('kas.index') }}" class="btn btn-outline-primary btn-sm">Batal</a>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
