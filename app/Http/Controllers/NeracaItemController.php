<?php

namespace App\Http\Controllers;

use App\Models\NeracaItem;
use App\Http\Requests\StoreNeracaItemRequest;
use App\Http\Requests\UpdateNeracaItemRequest;
use App\Models\JenisNeraca;
use App\Models\Neraca;
use App\Models\NeracaKategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;



class NeracaItemController extends Controller
{
    public function index()
    {
        $title = 'Data Item Neraca';
        return view('master.item_neraca', compact('title'));
    }

    public function neracaitem(Request $request)
    {
        $title = 'Data Item Neraca';

        $rowLimit = isset($request->length) ? $request->length : '10';
        $offset = isset($request->start) ? $request->start : 0;
        $search = isset($request->search['value']) ? $request->search['value'] : '';
        $draw = isset($request->draw) ? $request->draw : 1;

        $data = NeracaItem::select(
            'neraca_items.id',
            'neraca_items.akun',
            'neraca_items.kategori_id',
            'neraca_items.jenis_id',
            'neraca_items.neraca_item',
            'neraca_items.deskripsi',
            'neraca_kategori.kategori',
            'neraca_jenis.jenis',
        )
            ->leftJoin('neraca_kategori', 'neraca_items.kategori_id',  '=', 'neraca_kategori.id')
            ->leftJoin('neraca_jenis', 'neraca_items.jenis_id',  '=', 'neraca_jenis.id');

        if ($search != '') {
            $data->where('neraca_items.akun', 'like', '%' . $search . '%')
                ->orWhere('neraca_items.neraca_item', 'like', '%' . $search . '%')
                ->orwhere('neraca_jenis.jenis', 'like', '%' . $search . '%');
        }

        $neracaItem = $data->offset($offset)->limit($rowLimit)->get();
        $totalFiltered = $data->count();

        $response = [
            'data' => $neracaItem,
            "draw" => intval($draw),
            "recordsFiltered" => $totalFiltered,
            "recordsTotal" => NeracaItem::count(),
        ];
        return response()->json($response, 200);
        // return view('master.item_neraca', compact('neracaItem', 'title'));
    }

    public function create()
    {
        $neracaItem = new NeracaItem();
        $title = 'Input Data Item Neraca';
        $kategori_id = NeracaKategori::pluck('kategori', 'kategori')->toArray();
        $jenisneraca_id = JenisNeraca::pluck('jenis', 'jenis')->toArray();

        return view('master.form_item_neraca', compact('neracaItem', 'kategori_id', 'jenisneraca_id', 'title'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kategori_id' => 'required',
            'jenis_id' => 'required',
            'neraca_item' => 'required',
            'akun' => 'required',
            'deskripsi' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $neracaItem = NeracaItem::create([
            'kategori_id' => $request->kategori_id,
            'jenis_id'     => $request->jenis_id,
            'neraca_item'  => $request->neraca_item,
            'akun'  => $request->akun,
            'deskripsi' => $request->deskripsi,
        ]);

        return response()->json(['message' => 'Data created successfully', 'data' => $neracaItem], 201);
    }

    public function show(NeracaItem $neracaItem)
    {
        //
    }

    public function edit(NeracaItem $neracaItem)
    {
        //
    }

    public function update(UpdateNeracaItemRequest $request, NeracaItem $neracaItem)
    {
        //
    }
    public function destroy(NeracaItem $neracaItem)
    {
        //
    }

    public function getJenisByKategori(Request $request)
    {
        $kategori_id = $request->input('kategori_id');
        $jenisneraca_id = JenisNeraca::where('kategori_id', $kategori_id)->pluck('jenis', 'id')->toArray();

        return response()->json(['jenisneraca_id' => $jenisneraca_id]);
    }
}
