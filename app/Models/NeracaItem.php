<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NeracaItem extends Model
{
    use HasFactory;
    protected $table = 'neraca_items';
    protected $guarded = [];
    protected $fillable = ['akun', 'kategori_id', 'jenis_id', 'neraca_item', 'deskripsi'];
    protected $timestamp = true;

    public function jenisneraca()
    {
        return $this->belongsTo(JenisNeraca::class, 'jenis_id', 'id');
    }

    public function kategori()
    {
        return $this->belongsTo(NeracaKategori::class, 'kategori_id', 'id');
    }
}
