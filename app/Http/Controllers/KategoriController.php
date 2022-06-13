<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KategoriController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::latest()->get();
        return view('kategoris.index', compact('kategoris'));
    }

    public function create()
    {
        return view('kategoris.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'jenis_kategori' => 'required',
            'nama_kategori' => 'required|string|max:30',
        ]);

        $kategori = Kategori::create([
            'jenis_kategori' => $request->jenis_kategori,
            'nama_kategori' => $request->nama_kategori,
            'slug' => Str::slug($request->nama_kategori)
        ]);

        if ($kategori) {
            return redirect()
                ->route('kategori.index')
                ->with([
                    'success' => 'Data berhasil ditambahkan'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Gagal menambahkan data'
                ]);
        }
    }

    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('kategoris.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'jenis_kategori' => 'required',
            'nama_kategori' => 'required|string|max:30',
        ]);

        $kategori = Kategori::findOrFail($id);

        $kategori->update([
            'jenis_kategori' => $request->jenis_kategori,
            'nama_kategori' => $request->nama_kategori,
            'slug' => Str::slug($request->nama_kategori)
        ]);

        if ($kategori) {
            return redirect()
                ->route('kategori.index')
                ->with([
                    'success' => 'Data Berhasil diubah'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Data Gagal diubah'
                ]);
        }
    }

    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        if ($kategori) {
            return redirect()
                ->route('kategori.index')
                ->with([
                    'success' => 'Data berhasil dihapus'
                ]);
        } else {
            return redirect()
                ->route('kategori.index')
                ->with([
                    'error' => 'Gagal dihapus harap ulangi'
                ]);
        }
    }
}
