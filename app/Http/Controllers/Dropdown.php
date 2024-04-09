<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NeracaKategori;
use App\Models\JenisNeraca;
use App\Models\NeracaItem;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;

class Dropdown extends Controller
{
    public function index(): View
    {
        $data['neracaKategori'] = NeracaKategori::get(["kategori", "id"]);
        return view('dropdown', $data);
    }

    public function fetchjenis(Request $request): JsonResponse
    {
        $data['neracaJenis'] = JenisNeraca::where('kategori_id', $request->kategori_id)->get(['jenis', 'id']);
        return response()->json($data);
    }

    // public function fetchTps(Request $request): JsonResponse
    // {
    //     $data['tps'] = Tps::where('Desa_id', $request->Desa_id)->get(['Nama_tps', 'id']);
    //     return response()->json($data);
    // }
}