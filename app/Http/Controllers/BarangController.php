<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\kategoribarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BarangController extends Controller
{
    // Cek apakah user admin

    // Menampilkan semua barang
    public function index()
    {
       

        $barangs = barang::with('kategori')->get();

        return view('barang.index', compact('barangs'));
    }

    // Form tambah barang
    public function create()
    {
     

        $kategori = kategoribarang::all();

        return view('barang.create', compact('kategori'));
    }

    // Simpan barang
    public function store(Request $request)
    {
      

        $request->validate([
            'kategori_id' => 'required|exists:kategoribarangs,id',
            'kode_barang' => 'required|unique:barangs,kode_barang',
            'nama_barang' => 'required',
            'jumlah' => 'required|integer|min:1',
            'kondisi' => 'required|in:Baik,Rusak Ringan,Rusak Berat,Hilang',
            'lokasi' => 'required',
            'tanggal_masuk' => 'required|date'
        ]);

        barang::create($request->all());

        return redirect()->route('barang.index')
            ->with('success', 'Barang berhasil ditambahkan.');
    }

    // Form edit
    public function edit(barang $barang)
    {
    

        $kategori = kategoribarang::all();

        return view('barang.edit', compact('barang', 'kategori'));
    }

    // Update barang
    public function update(Request $request, barang $barang)
    {
     

        $request->validate([
            'kategori_id' => 'required|exists:kategoribarangs,id',
            'kode_barang' => 'required|unique:barangs,kode_barang,' . $barang->id,
            'nama_barang' => 'required',
            'jumlah' => 'required|integer|min:0',
            'kondisi' => 'required|in:Baik,Rusak Ringan,Rusak Berat,Hilang',
            'lokasi' => 'required',
            'tanggal_masuk' => 'required|date'
        ]);

        $barang->update($request->all());

        return redirect()->route('barang.index')
            ->with('success', 'Barang berhasil diperbarui.');
    }

    // Hapus barang
    public function destroy(barang $barang)
    {
      

        $barang->delete();

        return redirect()->route('barang.index')
            ->with('success', 'Barang berhasil dihapus.');
    }
}