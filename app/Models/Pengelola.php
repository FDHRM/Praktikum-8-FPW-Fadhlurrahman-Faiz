<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengelola extends Model
{
    protected $table = 'pengelola';
    protected $fillable = ['nama', 'umur', 'jenis_kelamin', 'jabatan_pengelola_id'];

    public function jabatanPengelola()
    {
        return $this->belongsTo(JabatanPengelola::class, 'jabatan_pengelola_id');
    }
}
