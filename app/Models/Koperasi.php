<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Koperasi extends Model
{
    use HasFactory;
    protected $table = 'koperasis';
    protected $guarded = [];
    protected $fillable = ['nama', 'alamat', 'telp', 'email'];
    protected $timestamp = true;
}
