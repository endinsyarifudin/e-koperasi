<?php

namespace App\Http\Controllers;

use App\Models\NeracaKategori;
// use App\Http\Requests\StoreJenisRequest;
// use App\Http\Requests\UpdateJenisRequest;
use Illuminate\Http\Request;

class KatNeracaController extends Controller
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

        $data = new NeracaKategori();
        $data->fill($requestData);
        $data->save();
        flash('Data berhasil disimpan')->success();

        return redirect()->route('jenis.index');
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'kategori' => 'required',
            'akun' => 'required',
            'jenis' => 'required',
            'deskripsi' => 'nullable',
        ]);

        $neracaKategori = NeracaKategori::findOrFail($id);
        $neracaKategori->update($request->all());
        return redirect()->route('neracakteori.index')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        $neracaKategori = NeracaKategori::findOrFail($id);
        $neracaKategori->delete();

        return redirect()->route('neracakategori.index')->with('success', 'Data rekening berhasil dihapus');
    }

    public function getNamaKategori()
    {
        $neraca_kategori = NeracaKategori::all();
        return response()->json($neraca_kategori);
    }
}
