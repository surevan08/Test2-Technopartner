<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;


class TransaksiController extends Controller
{
    public function index()
    {
        $bulan = Carbon::now()->format('m'); 

        if (request()->start_date || request()->end_date) {
            $start_date = Carbon::parse(request()->start_date)->toDateTimeString();
            $end_date = Carbon::parse(request()->end_date)->toDateTimeString();
            $transaksis = Transaksi::whereBetween('created_at', [$start_date, $end_date])->get();
        } else {
            $transaksis = Transaksi::WhereMonth('created_at', [$bulan])->get(); 
        }

        return view('transaksis.index', compact('transaksis'));
    }
    public function create()
    {
        $kategoris = Kategori::latest()->get();
        return view('transaksis.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'deskripsi' => 'required',
            'nominal' => 'required|',
            'kategoris_id' => 'required'
        ]);

        $transaksi = Transaksi::create([
            'deskripsi' => $request->deskripsi,
            'nominal' => $request->nominal,
            'kategoris_id' => $request->kategoris_id,
            'slug' => Str::slug($request->title)
        ]);

        if ($transaksi) {
            return redirect()
                ->route('transaksi.index')
                ->with([
                    'success' => 'Data Berhasil Ditambahkan'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Data Gagal ditambahkan'
                ]);
        }
    }

    public function edit($id)
    {
        $kategoris = Kategori::latest()->get();
        $transaksi = Transaksi::findOrFail($id);
        return view('transaksis.edit', compact('transaksi', 'kategoris'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'deskripsi' => 'required',
            'nominal' => 'required|',
            'kategoris_id' => 'required'
        ]);

        $transaksi = Transaksi::findOrFail($id);

        $transaksi->update([
            'deskripsi' => $request->deskripsi,
            'nominal' => $request->nominal,
            'kategoris_id' => $request->kategoris_id,
            'slug' => Str::slug($request->title)
        ]);

        if ($transaksi) {
            return redirect()
                ->route('transaksi.index')
                ->with([
                    'success' => 'Data Berhasil Diubah'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Data gagal diubah'
                ]);
        }
    }

    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();

        if ($transaksi) {
            return redirect()
                ->route('transaksi.index')
                ->with([
                    'success' => 'Data Berhasil Dihapus'
                ]);
        } else {
            return redirect()
                ->route('transaksi.index')
                ->with([
                    'error' => 'Data Gagal dihapus'
                ]);
        }
    }
}
