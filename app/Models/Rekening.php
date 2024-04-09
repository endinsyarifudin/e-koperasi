<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekening extends Model
{
    use HasFactory;
    protected $table = 'rekenings';
    protected $guarded = [];
    protected $fillable = ['rekening', 'no_rek', 'deskripsi'];
    protected $timestamp = true;
}
