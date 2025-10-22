<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Buku extends Model
{
    protected $table = 'buku';
    protected $fillable = ['judul', 'pengarang', 'penerbit', 'kategori_buku_id'];


public function kategoriBuku()
{
    return $this->belongsTo(KategoriBuku::class, 'kategori_buku_id');
}

}