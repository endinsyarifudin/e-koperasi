<?php

namespace App\Http\Controllers;

use App\Models\NeracaKategori;
// use App\Http\Requests\StoreJenisRequest;
// use App\Http\Requests\UpdateJenisRequest;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $title = 'Data Kategori';
        return view('master.kategori_index', compact('title'));
    }

    public function datakategori(Request $request)
    {
        $title = 'Kategori Neraca';

        $rowLimit = isset($request->length) ? $request->length : '10';
        $offset = isset($request->start) ? $request->start : 0;
        $search = isset($request->search['value']) ? $request->search['value'] : '';
        $draw = isset($request->draw) ? $request->draw : 1;

        $data = NeracaKategori::select(
            'id',
            'kategori',
            'akun',
        );

        if ($search != '') {
            $data->where('kategori', 'like', '%' . $search . '%')
                ->orWhere('akun', 'like', '%' . $search . '%');
        }

        $neracaKategori = $data->offset($offset)->limit($rowLimit)->get();
        $totalFiltered = $data->count();

        $response = [
            'data' => $neracaKategori,
            "draw" => intval($draw),
            "recordsFiltered" => $totalFiltered,
            "recordsTotal" => NeracaKategori::count(),
        ];
        return response()->json($response, 200);
    }

    public function create()
    { {
            $neracaKategori = new NeracaKategori();
            $title = 'Input Kategori Neraca';
            return view('master.kategori_neraca_form', compact('neracaKategori', 'title'));
        }
    }

    public function store(Request $request)

    {
        $requestData = $request->validate([
            'kategori' => 'required|in:pendapatan,pengeluaran',
            'name' => 'required',
            'deskripsi' => 'nullable',
        ]);

        // dd($requestData);

        $data = new Jenis();
        $data->fill($requestData);
        $data->save();
        flash('Data berhasil disimpan')->success();

        return redirect()->route('jenis.index');
    }

    public function show(Jenis $jenis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jenis $jenis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJenisRequest $request, Jenis $jenis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jenis $jenis)
    {
        //
    }

    public function getNamaKategori()
    {
        $neraca_kategori = NeracaKategori::all();
        return response()->json($neraca_kategori);
    }
}
