<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserProfilController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $title = 'Profil User';
        return view('userprofile_index', compact('user', 'title'));
    }

    public function edit($id)
    {
        $user = auth()->user();
        $title = 'Form Ubah Profile User';
        return view('userprofile_edit', compact('title', 'user'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'nohp' => 'required|string',
            'password' => 'nullable|max:10', // bisi passwordna moal dieusian/dirobah
        ]);
        if ($request->password != '') {
            $data['password'] = bcrypt($request->password);
        } else {
            unset($data['password']); //jadi mun password kosong, moal dibawaan datana
        }

        // dd($request);

        $user = auth()->user();
        $user->fill($data);
        $user->update($data); // Menggunakan metode update() untuk menyimpan data yang sudah diverifikasi
        flash('Data berhasil diubah')->success();
        return redirect()->route('userprofile.index');
    }
}
