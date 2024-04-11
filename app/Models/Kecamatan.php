<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;
    protected $table = 'kecamatan';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'Nama_kec',
        'Tag'
    ];
    public function desa()
    {
        return $this->hasMany(Desa::class, 'Kec_id', 'id');
    }
}
