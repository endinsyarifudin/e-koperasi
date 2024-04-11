<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisLabarugi extends Model
{
    use HasFactory;
    protected $table = 'labarugi_jenis';
    protected $guarded = [];
    protected $fillable = ['akun', 'kategori_id', 'jenis_labarugi', 'deskripsi'];
    protected $timestamp = true;

    public function kategori()
    {
        return $this->belongsTo(LabarugiKategori::class, 'kategori_id', 'id');
    }
}
