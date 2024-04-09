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
                    {!! Form::model($neracaItem, [
                        'route' => isset($neracaItem->id) ? ['itemneraca.update', $neracaItem->id] : 'itemneraca.store',
                        'method' => isset($neracaItem->id) ? 'PUT' : 'POST',
                    ]) !!}

                    <div class="form-group mb-3">
                        {!! Form::label('kategori_id', 'Kategori') !!}
                        {!! Form::select('kategori_id', ['' => '- Pilih Kategori -'] + $kategori_id, null, [
                            'class' => 'form-control mt-1',
                            'id' => 'kategori_id',
                        ]) !!}
                        <span class="text-danger">{{ $errors->first('kategori') }}</span>
                    </div>

                    <div class="form-group mb-3">
                        {!! Form::label('jenisneraca_id', 'Jenis Neraca') !!}
                        {!! Form::select('jenisneraca_id', ['' => 'Pilih Jenis'], null, [
                            'class' => 'form-control mt-1',
                            'id' => 'jenisneraca_id',
                        ]) !!}
                        <span class="text-danger">{{ $errors->first('jenisneraca_id') }}</span>
                    </div>

                    <div class="form-group mb-3">
                        {!! Form::label('akun', 'No. Akun') !!}
                        {!! Form::text('akun', null, ['class' => 'form-control mt-1']) !!}
                        <span class="text-danger">{{ $errors->first('akun') }}</span>
                    </div>

                    <div class="form-group mb-3">
                        {!! Form::label('neraca_item', 'Nama Item') !!}
                        {!! Form::text('neraca_item', null, ['class' => 'form-control mt-1']) !!}
                        <span class="text-danger">{{ $errors->first('neraca_item') }}</span>
                    </div>
                    <div class="form-group mb-3">
                        {!! Form::label('deskripsi', 'Deskripsi') !!}
                        {!! Form::text('deskripsi', null, ['class' => 'form-control mt-1']) !!}
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

    <script>
        $(document).ready(function() {
            $('#kategori_id').on('change', function() {
                var kategori_id = this.value;
                $("#jenisneraca_id").html('<option value="">- pilih jenis neraca -</option>');
                $.ajax({
                    url: '{{ route('getJenisByKategori') }}',
                    type: "POST",
                    data: {
                        kategori_id: kategori_id,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $.each(result.jenisneraca_id, function(key, value) {
                            $("#jenisneraca_id").append('<option value="' + value.id +
                                '">' + value.jenis + '</option>');
                        });
                    }
                });
            });
        });
    </script>
@endsection
