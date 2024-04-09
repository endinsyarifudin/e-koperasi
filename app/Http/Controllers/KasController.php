<?php

namespace App\Http\Controllers;

use App\Models\Kas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KasController extends Controller
{
    public function index()
    {
        $kas = Kas::latest();
        $title = 'Neraca Keuangan';
        return view('kas_index', compact('kas', 'title'));
    }

    public function dataKas(Request $request)
    {
        $rowLimit = isset($request->length) ? $request->length : '10';
        $offset = isset($request->start) ? $request->start : 0;
        $search = isset($request->search['value']) ? $request->search['value'] : '';
        $draw = isset($request->draw) ? $request->draw : 1;

        $data = Kas::with('createdBy')->select(
            'id',
            'koperasi_id',
            'tanggal',
            'kategori',
            'kode_trx',
            'jenis_id',
            'uraian',
            'jumlah',
            'saldo_akhir',
            'created_by',
        );

        if ($search != '') {
            $data->where('tanggal', 'like', '%' . $search . '%')
                ->orWhere('keterangan', 'like', '%' . $search . '%')
                ->orWhere('kategori', 'like', '%' . $search . '%');
        }

        $kas = $data->offset($offset)->limit($rowLimit)->get();
        $totalFiltered = $data->count();

        $kasTransformed = $kas->map(function ($item) {
            $item->created_by = $item->createdBy->name ?? '';
            unset($item->createdBy);
            return $item;
        });

        $response = [
            'data' => $kasTransformed,
            "draw" => intval($draw),
            "recordsFiltered" => $totalFiltered,
            "recordsTotal" => Kas::count(),
        ];

        return response()->json($response, 200);
    }


    public function create()
    {
        $kas = new Kas();
        $title = 'Transaksi Baru';
        $saldoAkhir = Kas::SaldoAkhir();
        return view('form_kas', compact('kas', 'saldoAkhir', 'title'));
    }

    public function store(Request $request)
    {
        $requestData = $request->validate([
            'tanggal' => 'required|date',
            'kategori' => 'required|in:pendapatan,pengeluaran',
            'jenis_id' => 'required',
            'uraian' => 'required',
            'jumlah' => 'required|numeric',
        ]);
        $saldoAkhir = Kas::SaldoAkhir();
        if ($requestData['kategori'] == 'pendapatan') {
            $saldoAkhir += $requestData['jumlah'];
        } else {
            $saldoAkhir -= $requestData['jumlah'];
        }

        if ($saldoAkhir <= -1) {
            flash('Saldo tidak cukup, transaksi gagal')->error();
            return back();
        }

        $kas = new Kas();
        $kas->fill($requestData);
        $kas->koperasi_id = auth()->user()->koperasi_id;
        $kas->created_by = auth()->user()->id;
        $kas->saldo_akhir = $saldoAkhir;
        $kas->save();
        flash('Transaksi telah dilakukan, data berhasil disimpan')->success();

        return redirect()->route('kas.index')->with('success', 'Data kas berhasil disimpan');
    }

    public function show($id)
    {
        $kas = Kas::findOrFail($id);
        return view('kas.show', compact('kas'));
    }

    public function edit($id)
    {
        $kas = Kas::findOrFail($id);
        return view('kas.edit', compact('kas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'koperasi_id' => 'required|exists:koperasis,id',
            'tanggal' => 'required|date',
            'kategori' => 'nullable|string',
            'keterangan' => 'required|string',
            'jenis' => 'required|in:pendapatan,pengeluaran',
            'jumlah' => 'required|numeric',
            'saldo_akhir' => 'required|numeric',
            'created_by' => 'required|exists:users,id',
        ]);

        $kas = Kas::findOrFail($id);
        $kas->update($request->all());
        return redirect()->route('kas.index')->with('success', 'Data kas berhasil diperbarui');
    }

    public function destroy($id)
    {
        $kas = Kas::findOrFail($id);
        $kas->delete();

        return redirect()->route('kas.index')->with('success', 'Data kas berhasil dihapus');
    }

    public function calculateSaldoAkhir($tanggal)
    {
        $transaction = Kas::where('tanggal', '<=', $tanggal)
            ->orderBy('tanggal')
            ->orderBy('id')
            ->get();

        $saldo = 0;

        foreach ($transaction as $transaction) {
            if ($transaction->jenis == 'pendapatan') {
                $saldo += $transaction->jumlah;
            } else {
                $saldo -= $transaction->jumlah;
            }
        }
        return $saldo;
    }
}
