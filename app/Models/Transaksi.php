<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kategori;

class Transaksi extends Model
{
    protected $table = 'transaksis';
    use HasFactory;

    protected $fillable = [
        'deskripsi', 'nominal', 'slug', 'kategoris_id',
    ];


    public function kategoris()
    {
        return $this->belongsTo(Kategori::class);
    }
}
