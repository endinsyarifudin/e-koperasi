<?php

namespace App\Http\Controllers;

use App\Models\JenisNeraca;
use App\Http\Requests\StoreNeracaRequest;
use App\Http\Requests\UpdateNeracaRequest;
use App\Models\NeracaKategori;
use Illuminate\Http\Request;

class JneracaController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Jenis Neraca';

        $rowLimit = isset($request->length) ? $request->length : '10';
        $offset = isset($request->start) ? $request->start : 0;
        $search = isset($request->search['value']) ? $request->search['value'] : '';
        $draw = isset($request->draw) ? $request->draw : 1;

        $data = JenisNeraca::select(
            'id',
            'akun',
            'kategori_id',
            'jenis',
            'deskripsi',
        )->with('kategori');

        if ($search != '') {
            $data->where('akun', 'like', '%' . $search . '%')
                ->orWhere('jenis', 'like', '%' . $search . '%')
                ->orWhereHas('kategori', function ($query) use ($search) {
                    $query->where('kategori', 'like', '%' . $search . '%');
                });
        }

        $jenisNeraca = $data->offset($offset)->limit($rowLimit)->get();
        $totalFiltered = $data->count();

        $response = [
            'data' => $jenisNeraca,
            "draw" => intval($draw),
            "recordsFiltered" => $totalFiltered,
            "recordsTotal" => JenisNeraca::count(),
        ];

        return view('master.jenis_neraca_index', compact('jenisNeraca', 'title'));
    }

    public function create()
    {
        $jenisNeraca = new JenisNeraca();
        $kategori = NeracaKategori::pluck('kategori', 'id')->prepend('- Pilih Kategori -', '');
        $title = 'Input Data Jenis Neraca';
        return view('master.form_jenis_neraca', compact('jenisNeraca', 'kategori', 'title'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kategori_id' => 'required',
            'jenis' => 'required',
            'akun' => 'required',
            'deskripsi' => 'nullable',
        ]);

        $kategori = \App\Models\NeracaKategori::findOrFail($request->kategori_id);
        JenisNeraca::create($validatedData);
        flash('Data berhasil disimpan')->success();

        return redirect()->route('jenisneraca.index')->with('success', 'Data berhasil disimpan.');
    }

    public function show(Neraca $jenisNeraca, $id)
    {
        $jenisNeraca = Neraca::findOrFail($id);
        return view('master.jenisNeraca.show', compact('jenisNeraca'));
    }

    public function edit($id)
    {
        $title = 'Ubah Data Jenis Neraca';
        $jenisNeraca = Neraca::findOrFail($id);
        return view('master.form_jenis_neraca', compact('jenisNeraca', 'title'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kategori' => 'required|in:Aset,Kewajiban dan Modal',
            'akun' => 'required',
            'jenis' => 'required',
            'deskripsi' => 'nullable',
        ]);

        $jenisNeraca = Neraca::findOrFail($id);
        $jenisNeraca->update($request->all());
        return redirect()->route('jenisneraca.index')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        $jenisNeraca = Neraca::findOrFail($id);
        $jenisNeraca->delete();

        return redirect()->route('jenisneraca.index')->with('success', 'Data rekening berhasil dihapus');
    }

    public function getNamaJenis()
    {
        $neraca_jenis = JenisNeraca::all();
        return response()->json($neraca_jenis);
    }
}
