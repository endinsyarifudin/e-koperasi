{{-- @extends('layouts.app_adminkit') --}}
@extends('layouts.app_acorn')

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

                    <div class="form-group mb-3 ">
                        {!! Form::label('jenis', 'Jenis Transaksi') !!}
                        <div class="form-check mt-2">
                            {!! Form::radio('jenis', 'pendapatan', true, ['class' => 'form-check-input', 'id' => 'pendapatan']) !!}
                            {!! Form::label('pendapatan', 'Kredit', ['class' => 'form-check-label']) !!}
                        </div>
                        <div class="form-check">
                            {!! Form::radio('jenis', 'pengeluaran', false, ['class' => 'form-check-input', 'id' => 'pengeluaran']) !!}
                            {!! Form::label('pengeluaran', 'Debet', ['class' => 'form-check-label']) !!}
                        </div>
                        <span class="text-danger">{{ $errors->first('jenis') }}</span>
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