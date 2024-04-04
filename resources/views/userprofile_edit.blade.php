@extends('layouts.app_adminkit')

@section('content')
    <h2 class="h3 mb-3">Form Edit Profile</h2>

    <div class="row">
        <div class="col-12">
            <div class="card">
                {{-- <div class="card-header">
                    <h5 class="card-title mb-0">
                        Silahkan ubah profil anda</h5>
                </div> --}}
                <div class="card-body">
                    {!! Form::model(auth()->user(), [
                        'route' => ['userprofil.update', 0],
                        'method' => 'PUT',
                    ]) !!}
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama User</label>
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        <span class="text-danger">{!! $errors->first('name') !!}</span>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email </label>
                        {!! Form::email('email', null, ['class' => 'form-control']) !!}
                        <span class="text-danger">{!! $errors->first('email') !!}</span>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        {!! Form::password('password', ['class' => 'form-control']) !!}
                        <span class="text-danger">{!! $errors->first('password') !!}</span>
                    </div>

                    {!! Form::submit('simpan', ['class' => 'btn btn-primary btn-sm']) !!}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
