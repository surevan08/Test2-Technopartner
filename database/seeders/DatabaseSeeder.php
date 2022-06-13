<?php

namespace Database\Seeders;

use App\Models\Kategori;
use App\Models\Transaksi;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Kategori::create([
            'jenis_kategori' => 'Pemasukan',
            'nama_kategori' => 'Gaji',
            'slug' => 'Gaji',
        ]);
        Kategori::create([
            'jenis_kategori' => 'Pemasukan',
            'nama_kategori' => 'Tunjangan',
            'slug' => 'Tunjangan',
        ]);
        Kategori::create([
            'jenis_kategori' => 'Pemasukan',
            'nama_kategori' => 'Bonus',
            'slug' => 'Bonus',
        ]);

        Kategori::create([
            'jenis_kategori' => 'Pengeluaran',
            'nama_kategori' => 'Sewa Kost',
            'slug' => 'Sewa Kost',
        ]);
        Kategori::create([
            'jenis_kategori' => 'Pengeluaran',
            'nama_kategori' => 'Makan',
            'slug' => 'Makan',
        ]);
        Kategori::create([
            'jenis_kategori' => 'Pengeluaran',
            'nama_kategori' => 'Pakaian',
            'slug' => 'Pakaian',
        ]);
        Kategori::create([
            'jenis_kategori' => 'Pengeluaran',
            'nama_kategori' => 'Nonton Bioskop',
            'slug' => 'Nonton Bioskop',
        ]);

        Transaksi::create([
            'deskripsi' => 'Lorem Ipsum is simply dummy text only five centuries, but also the leap into electronic',
            'nominal' => '50000',
            'kategoris_id' => '7',
            'slug' => 'Nonton Bioskop',
        ]);

        Transaksi::create([
            'deskripsi' => 'It is a long established fact that a reader will be distracted by the readable',
            'nominal' => '3000000',
            'kategoris_id' => '1',
            'slug' => 'Gajian',
        ]);
    }
}
