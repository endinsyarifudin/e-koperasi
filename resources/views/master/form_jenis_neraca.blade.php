@php
    $html_tag_data = ['scrollspy' => 'true'];
    $title = $title;
    $description = 'Input Data Rekening';
    $breadcrumbs = [];
@endphp
@extends('layout', ['html_tag_data' => $html_tag_data, 'title' => $title, 'description' => $description])

@section('css')
    <link rel="stylesheet" href="/css/vendor/datatables.min.css" />
@endsection

@section('js_vendor')
@endsection

@section('js_page')
@endsection

@section('content')
    <h4 class="h4 mb-3">Form {{ $title }}</h4>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    {!! Form::model($jenisNeraca, [
                        'route' => isset($jenisNeraca->id) ? ['jenisneraca.update', $jenisNeraca->id] : 'jenisneraca.store',
                        'method' => isset($jenisNeraca->id) ? 'PUT' : 'POST',
                    ]) !!}

                    <div class="form-group mb-3">
                        {!! Form::label('kategori', 'Kategori & Sub-Kategori') !!}
                        {!! Form::select('kategori_id', $kategori, null, ['class' => 'form-control mt-1', 'id' => 'kategori']) !!}
                        <span class="text-danger">{{ $errors->first('kategori_id') }}</span>
                    </div>

                    <div class="form-group mb-3">
                        {!! Form::label('jenis', 'Jenis') !!}
                        {!! Form::text('jenis', null, [
                            'class' => 'form-control mt-1',
                        ]) !!}
                        <span class="text-danger">{{ $errors->first('jenis') }}</span>
                    </div>

                    <div class="form-group mb-3">
                        {!! Form::label('akun', 'No. Akun') !!}
                        {!! Form::text('akun', null, [
                            'class' => 'form-control mt-1',
                        ]) !!}
                        <span class="text-danger">{{ $errors->first('akun') }}</span>
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
