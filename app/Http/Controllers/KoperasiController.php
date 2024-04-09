<?php

namespace App\Http\Controllers;

use App\Models\Koperasi;
use App\Http\Requests\StoreKoperasiRequest;
use App\Http\Requests\UpdateKoperasiRequest;
use Illuminate\Http\Request;

class KoperasiController extends Controller
{
    public function index()
    {
        $koperasi = auth()->user()->koperasi;
        $title = 'Data Koperasi';
        return view('koperasi_index', compact('koperasi', 'title'));
    }

    public function create()
    {
        $koperasi = auth()->user()->koperasi;
        $title = 'Form Input Data Koperasi';
        $koperasi = $koperasi ?? new Koperasi();
        // $koperasi = new Koperasi();
        return view('koperasi_form', compact('koperasi', 'title'));
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
        return redirect()->route('koperasi.index')->with('success', 'Data Koperasi berhasil dibuat');
    }


    // public function index()
    // {
    //     //
    // }

    // public function show(Koperasi $koperasi)
    // {
    //     //
    // }

    public function edit($id)
    {
        $koperasi = auth()->user()->koperasi;

        if ($koperasi && $koperasi->id == $id) {
            $title = 'Ubah Data Koperasi';
            return view('koperasi_form', compact('koperasi', 'title'));
        } else {
            return redirect()->route('koperasi.index')->with('error', 'Anda tidak memiliki izin untuk mengedit data koperasi ini');
        }

        // $title = 'Ubah Data Koperasi';
        // $koperasi = Koperasi::findOrFail($id);
        // return view('koperasi_form', compact('koperasi', 'title'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'telp' => 'required|string',
            'email' => 'required|email',
        ]);

        // Pastikan koperasi yang akan diupdate sesuai dengan koperasi yang dimiliki oleh pengguna yang sedang login
        $koperasi = auth()->user()->koperasi;
        if ($koperasi && $koperasi->id == $id) {
            $koperasi = Koperasi::findOrFail($id);
            $koperasi->update($request->all());
            return redirect()->route('koperasi.index')->with('success', 'Data berhasil diperbarui');
        } else {
            return redirect()->route('koperasi.index')->with('error', 'Anda tidak memiliki izin untuk mengedit data koperasi ini');
        }
    }
}
