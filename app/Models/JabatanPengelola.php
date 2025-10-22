<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JabatanPengelola extends Model
{
    protected $table = 'jabatan_pengelola';
    protected $fillable = ['nama_jabatan'];



public function buku(): HasMany
{
    return $this->hasMany(Buku::class, 'jabatan_pengelola_id');
}

}
