<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabarugiKategori extends Model
{
    use HasFactory;
    protected $table = 'labarugi_kategori';
    protected $guarded = [];
    protected $fillable = ['labarugi_kategori', 'akun', 'deskripsi'];
    protected $timestamp = true;
}
