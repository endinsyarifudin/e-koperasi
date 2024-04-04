<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserProfilController extends Controller
{
    public function index()
    {
        return view('user_profile');
    }

    public function edit($id)
    {
        return view('userprofile_edit');
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'nullable|min:6', // bisi passwordna moal dieusian/dirobah
        ]);
        if ($request->password != '') {
            $data['password'] = bcrypt($request->password);
        } else {
            unset($data['password']); //jadi mun password kosong, moal dibawaan datana
        }
        $user = auth()->user();
        $user->fill($data);
        $user->save();
        flash('Data berhasil diubah')->success();
        return back();
    }
}
