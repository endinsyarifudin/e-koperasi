<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisNeraca extends Model
{
    use HasFactory;
    protected $table = 'neraca_jenis';
    protected $guarded = [];
    protected $fillable = ['akun', 'kategori_id', 'jenis', 'deskripsi'];
    protected $timestamp = true;

    public function kategori()
    {
        return $this->belongsTo(NeracaKategori::class, 'kategori_id', 'id');
    }
}
