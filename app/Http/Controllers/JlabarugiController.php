<?php

namespace App\Http\Controllers;

use App\Models\JenisNeraca;
use App\Http\Requests\StoreNeracaRequest;
use App\Http\Requests\UpdateNeracaRequest;
use App\Models\JenisLabarugi;
use App\Models\LabarugiKategori;
use App\Models\NeracaKategori;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JlabarugiController extends Controller
{
    public function index()
    {
        $title = 'Data Jenis Laba Rugi';
        return view('master.jenis_labarugi_index', compact('title'));
    }

    public function jenisLabaRugi(Request $request)
    {
        $title = 'Jenis Laba Rugi';

        $rowLimit = isset($request->length) ? $request->length : '10';
        $offset = isset($request->start) ? $request->start : 0;
        $search = isset($request->search['value']) ? $request->search['value'] : '';
        $draw = isset($request->draw) ? $request->draw : 1;

        $data = JenisLabarugi::select(
            'labarugi_jenis.id',
            'labarugi_jenis.kategori_id',
            'labarugi_jenis.jenis_labarugi',
            'labarugi_jenis.akun',
            'labarugi_jenis.deskripsi',
            'labarugi_kategori.labarugi_kategori',
        )
            ->leftJoin('labarugi_kategori', 'labarugi_jenis.kategori_id',  '=', 'labarugi_kategori.id');

        if ($search != '') {
            $data->where('labarugi_jenis.akun', 'like', '%' . $search . '%')
                ->orWhere('labarugi_jenis.jenis_labarugi', 'like', '%' . $search . '%')
                ->orwhere('labarugi_jenis.deskripsi', 'like', '%' . $search . '%');
        }

        $jenisLabarugi = $data->offset($offset)->limit($rowLimit)->get();
        $totalFiltered = $data->count();

        $response = [
            'data' => $jenisLabarugi,
            "draw" => intval($draw),
            "recordsFiltered" => $totalFiltered,
            "recordsTotal" => JenisLabarugi::count(),
        ];
        return response()->json($response, 200);
        // return view('master.jenis_labarugi_index', compact('jenisLabarugi', 'title'));
    }

    public function create()
    {
        $jenisLabarugi = new JenisLabarugi();
        $kategori = LabarugiKategori::pluck('labarugi_kategori', 'id')->prepend('- Pilih Kategori -', '');
        $title = 'Input Data Jenis Laba Rugi';
        return view('master.form_jenis_labarugi', compact('jenisLabarugi', 'kategori', 'title'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kategori_id' => 'required',
            'jenis_labarugi' => 'required',
            'akun' => 'required',
            'deskripsi' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $jenisLabarugi = JenisLabarugi::create([
            'kategori_id' => $request->kategori_id,
            'jenis_labarugi' => $request->jenis_labarugi,
            'akun'  => $request->akun,
            'deskripsi' => $request->deskripsi,
        ]);

        return response()->json(['message' => 'Data created successfully', 'data' => $jenisLabarugi], 201);
    }
    public function edit($id)
    {
        $jenisLabarugi = JenisLabarugi::findOrFail($id);
        $kategori = LabarugiKategori::pluck('labarugi_kategori', 'id')->toArray();
        $title = 'Ubah Data Jenis Laba Rugi';
        return view('master.form_jenis_labarugi', compact('jenisLabarugi', 'kategori', 'title'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'kategori_id' => 'required',
            'jenis_labarugi' => 'required',
            'akun' => 'required',
            'deskripsi' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $jenisLabarugi = JenisLabarugi::findOrFail($id);

        $jenisLabarugi->kategori_id = $request->kategori_id;
        $jenisLabarugi->jenis_labarugi = $request->jenis_labarugi;
        $jenisLabarugi->akun = $request->akun;
        $jenisLabarugi->deskripsi = $request->deskripsi;

        $jenisLabarugi->save();

        return response()->json(['message' => 'Data updated successfully', 'data' => $jenisLabarugi], 200);
    }

    public function destroy($id)
    {
        try {
            $jenis_labarugi = JenisLabarugi::findOrFail($id); //  ID
            $jenis_labarugi->delete();

            return response()->json(['message' => 'data deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to delete data'], 500);
        }
    }

    public function getNamaKatLabarugi()
    {
        $kategoriLabarugi = LabarugiKategori::all();
        return response()->json($kategoriLabarugi);
    }
}
