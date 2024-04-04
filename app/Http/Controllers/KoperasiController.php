<?php

namespace App\Http\Controllers;

use App\Models\Koperasi;
use App\Http\Requests\StoreKoperasiRequest;
use App\Http\Requests\UpdateKoperasiRequest;
use Illuminate\Http\Request;

class KoperasiController extends Controller
{

    public function create()
    {
        $koperasi = auth()->user()->koperasi;
        $koperasi = $koperasi ?? new Koperasi();
        return view('koperasi_form', [
            'koperasi' => $koperasi,
            'title' => 'Form Data Koperasi'
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'telp' => 'required',
            'email' => 'required',
        ]);
        $koperasi = auth()->user()->koperasi;
        $koperasi = $koperasi ?? new Koperasi();
        $koperasi->nama = $data['nama'];
        $koperasi->alamat = $data['alamat'];
        $koperasi->telp = $data['telp'];
        $koperasi->email = $data['email'];
        $koperasi->save();

        $user = auth()->user();
        $user->koperasi_id = $koperasi->id;
        $user->save();
        flash('Data berhasil disimpan');
        return back();
    }


    // public function index()
    // {
    //     //
    // }

    // public function show(Koperasi $koperasi)
    // {
    //     //
    // }

    // public function edit(Koperasi $koperasi)
    // {
    //     //
    // }

    // public function update(UpdateKoperasiRequest $request, Koperasi $koperasi)
    // {
    //     //
    // }

    // public function destroy(Koperasi $koperasi)
    // {
    //     //
    // }
}
