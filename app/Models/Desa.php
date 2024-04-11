<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    use HasFactory;
    protected $table = 'desa';
    protected $primaryKey = 'id';
    protected $fillable = [
        'Nama_desa', 'Kec_id', 'Tag',
    ];

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'Kec_id', 'id');
    }
}
