<?php

namespace App\Http\Controllers;

use App\Models\kategoribarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KategoriBarangController extends Controller
{
    // Daftar kategori
    public function index()
    {
        $kategori = kategoribarang::all();

        return view('kategori.index', compact('kategori'));
    }

    // Form tambah kategori
    public function create()
    {
        return view('kategori.create');
    }

    // Simpan kategori
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:kategoribarangs,name'
        ]);

        kategoribarang::create([
            'name' => $request->name
        ]);

        return redirect()->route('kategori.index')
            ->with('success', 'Kategori berhasil ditambahkan.');
    }

    // Form edit
    public function edit(kategoribarang $kategori)
    {
        return view('kategori.edit', compact('kategori'));
    }

    // Update kategori
    public function update(Request $request, kategoribarang $kategori)
    {
        $request->validate([
            'name' => 'required|unique:kategoribarangs,name,' . $kategori->id
        ]);

        $kategori->update([
            'name' => $request->name
        ]);

        return redirect()->route('kategori.index')
            ->with('success', 'Kategori berhasil diperbarui.');
    }

    // Hapus kategori
    public function destroy(kategoribarang $kategori)
    {
        $kategori->delete();

        return redirect()->route('kategori.index')
            ->with('success', 'Kategori berhasil dihapus.');
    }
}