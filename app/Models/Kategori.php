<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Transaksi;

class Kategori extends Model
{
    protected $table = 'kategoris';
    use HasFactory;

    protected $fillable = [
        'jenis_kategori', 'nama_kategori', 'slug'
    ];

    public function transaksis()
    {
        return $this->hashMany(Transaksi::class);
    }
}
