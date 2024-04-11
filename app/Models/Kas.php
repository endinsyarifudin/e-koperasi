<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kas extends Model
{
    use HasFactory;
    protected $table = 'kas';
    protected $guarded = [];
    protected $fillable = [
        'koperasi_id', 'tanggal', 'kode_trx', 'kategori', 'jenis_id', 'uraian', 'jumlah',
        'saldo_akhir', 'created_by',
    ];
    protected $casts = ['tanggal' => 'datetime:d-m-Y H:i'];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by',);
    }

    public function jenis()
    {
        return $this->belongsTo(Jenis::class, 'jenis_id');
    }

    public function scopeSaldoAkhir($query, $koperasiId = null)
    {
        $koperasiId = $koperasiId ?? auth()->user()->koperasi_id;
        return $query->where('koperasi_id', $koperasiId)
            ->orderBy('created_at', 'desc')
            ->value('saldo_akhir');
    }
}
