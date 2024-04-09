<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NeracaKategori extends Model
{
    use HasFactory;
    protected $table = 'neraca_kategori';
    protected $guarded = [];
    protected $fillable = ['kategori', 'akun'];
    protected $timestamp = true;
}
