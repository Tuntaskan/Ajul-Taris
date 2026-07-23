<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\laporankerusakan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaporanKerusakanController extends Controller
{
    // Menampilkan semua laporan
    public function index()
    {
        $laporans = laporankerusakan::with(['barang', 'user'])->latest()->get();

        return view('laporankerusakan.index', compact('laporans'));
    }

    // Form tambah laporan
    public function create()
    {
        $barang = barang::all();

        return view('laporankerusakan.create', compact('barang'));
    }

    // Simpan laporan
    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'tanggal_laporan' => 'required|date',
            'keterangan' => 'nullable|string|max:255',
        ]);

        laporankerusakan::create([
            'barang_id' => $request->barang_id,
            'user_id' => Auth::id(),
            'tanggal_laporan' => $request->tanggal_laporan,
            'keterangan' => $request->keterangan,
            'status' => 'Menunggu'
        ]);

        return redirect()->route('laporankerusakan.index')
            ->with('success', 'Laporan kerusakan berhasil ditambahkan.');
    }

    // Form edit
    public function edit(laporankerusakan $laporankerusakan)
    {
        $barang = barang::all();

        return view('laporankerusakan.edit', compact('laporankerusakan', 'barang'));
    }

    // Update laporan
    public function update(Request $request, laporankerusakan $laporankerusakan)
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'tanggal_laporan' => 'required|date',
            'keterangan' => 'nullable|string|max:255',
            'status' => 'required|in:Menunggu,Proses,Selesai',
        ]);

        $laporankerusakan->update([
            'barang_id' => $request->barang_id,
            'user_id' => Auth::id(),
            'tanggal_laporan' => $request->tanggal_laporan,
            'keterangan' => $request->keterangan,
            'status' => $request->status,
        ]);

        return redirect()->route('laporankerusakan.index')
            ->with('success', 'Laporan kerusakan berhasil diperbarui.');
    }

    // Hapus laporan
    public function destroy(laporankerusakan $laporankerusakan)
    {
        $laporankerusakan->delete();

        return redirect()->route('laporankerusakan.index')
            ->with('success', 'Laporan kerusakan berhasil dihapus.');
    }
}