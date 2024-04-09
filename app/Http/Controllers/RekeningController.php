<?php

namespace App\Http\Controllers;

use App\Models\Rekening;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRekeningRequest;
use App\Http\Requests\UpdateRekeningRequest;

class RekeningController extends Controller
{
    public function index(Request $request)
    {
        // $jenis = Jenis::latest();
        $title = 'Data Rekening';
        $rowLimit = isset($request->length) ? $request->length : '10';
        $offset = isset($request->start) ? $request->start : 0;
        $search = isset($request->search['value']) ? $request->search['value'] : '';
        $draw = isset($request->draw) ? $request->draw : 1;

        $data = Rekening::select(
            'id',
            'rekening',
            'no_rek',
            'deskripsi',
        );

        if ($search != '') {
            $data->where('rekening', 'like', '%' . $search . '%')
                ->orWhere('no_rek', 'like', '%' . $search . '%')
                ->orWhere('deskripsi', 'like', '%' . $search . '%');
        }

        $rekening = $data->offset($offset)->limit($rowLimit)->get();
        $totalFiltered = $data->count();

        $response = [
            'data' => $rekening,
            "draw" => intval($draw),
            "recordsFiltered" => $totalFiltered,
            "recordsTotal" => Rekening::count(),
        ];

        return view('rekening_index', compact('rekening', 'title'));
    }

    public function create()
    {
        $rekening = new Rekening();
        $title = 'Input Data Rekening';
        return view('form_rekening', compact('rekening', 'title'));
    }


    public function store(Request $request)

    {
        $requestData = $request->validate([
            'rekening' => 'required',
            'no_rek' => 'nullable',
            'deskripsi' => 'nullable',
        ]);

        // dd($requestData);

        $data = new Rekening();
        $data->fill($requestData);
        $data->save();
        flash('Data rekening berhasil disimpan')->success();

        return redirect()->route('rekening.index');
    }

    public function show(Rekening $rekening, $id)
    {
        $rekening = Rekening::findOrFail($id);
        return view('rekening.show', compact('rekening'));
    }

    public function edit($id)
    {
        $title = 'Ubah Data Rekening';
        $rekening = Rekening::findOrFail($id);
        return view('form_rekening', compact('rekening', 'title'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'rekening' => 'required|string',
            'no_rek' => 'nullable',
            'deskripsi' => 'required',
        ]);

        $rekening = Rekening::findOrFail($id);
        $rekening->update($request->all());
        return redirect()->route('rekening.index')->with('success', 'Data rekening berhasil diperbarui');
    }

    public function destroy($id)
    {
        $rekening = Rekening::findOrFail($id);
        $rekening->delete();

        return redirect()->route('rekening.index')->with('success', 'Data rekening berhasil dihapus');
    }
}
