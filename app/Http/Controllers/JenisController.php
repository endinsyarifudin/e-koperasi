<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
// use App\Http\Requests\StoreJenisRequest;
// use App\Http\Requests\UpdateJenisRequest;
use Illuminate\Http\Request;

class JenisController extends Controller
{
    public function index(Request $request)
    {
        // $jenis = Jenis::latest();
        $title = 'Jenis Pendapatan dan Pengeluaran';

        $rowLimit = isset($request->length) ? $request->length : '10';
        $offset = isset($request->start) ? $request->start : 0;
        $search = isset($request->search['value']) ? $request->search['value'] : '';
        $draw = isset($request->draw) ? $request->draw : 1;

        $data = Jenis::select(
            'id',
            'name',
            'kategori',
            'deskripsi',
        );

        if ($search != '') {
            $data->where('name', 'like', '%' . $search . '%')
                ->orWhere('kategori', 'like', '%' . $search . '%')
                ->orWhere('deskripsi', 'like', '%' . $search . '%');
        }

        $jenis = $data->offset($offset)->limit($rowLimit)->get();
        $totalFiltered = $data->count();

        $response = [
            'data' => $jenis,
            "draw" => intval($draw),
            "recordsFiltered" => $totalFiltered,
            "recordsTotal" => Jenis::count(),
        ];

        return view('master.form_jpen_peng', compact('jenis', 'title'));
    }

    public function create()
    { {
            $jenis = new Jenis();
            $title = 'Input Data Jenis';
            return view('master.form_jenis', compact('jenis', 'title'));
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
}
