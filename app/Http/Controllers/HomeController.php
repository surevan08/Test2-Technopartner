<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Transaksi;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->Transaksi = new Transaksi();
    }
    public function index()
    {
        $pemasukan      =   Transaksi::whereIn('kategoris_id', Kategori::select('id')->where('jenis_kategori', 'Pemasukan'))->sum('nominal');
        $pengeluaran    =   Transaksi::whereIn('kategoris_id', Kategori::select('id')->where('jenis_kategori', 'Pengeluaran'))->sum('nominal');
        $saldo          =   $pemasukan - $pengeluaran;

        return view('home', compact('pemasukan', 'pengeluaran', 'saldo'));
    }
}
