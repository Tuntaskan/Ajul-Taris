<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    // Menampilkan semua data peminjaman
    public function index()
    {
        $peminjamans = Peminjaman::with('barang', 'user')->get();

        return view('peminjaman.index', compact('peminjamans'));
    }

    // Form tambah peminjaman
    public function create()
    {
        $barang = barang::where('jumlah', '>', 0)->get();

        return view('peminjaman.create', compact('barang'));
    }

    // Simpan peminjaman
    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'jumlah' => 'required|integer|min:1',
            'tanggal_peminjaman' => 'required|date',
            'tanggal_pengembalian' => 'nullable|date|after_or_equal:tanggal_peminjaman',
        ]);

        $barang = Barang::findOrFail($request->barang_id);

        if ($request->jumlah > $barang->jumlah) {

            return back()
                ->withInput()
                ->with('error', 'Jumlah melebihi stok yang tersedia.');
        }

        Peminjaman::create([
            'user_id' => Auth::id(),
            'barang_id' => $request->barang_id,
            'tanggal_peminjaman' => $request->tanggal_peminjaman,
            'tanggal_pengembalian' => $request->tanggal_pengembalian,
            'status' => 'Menunggu'
        ]);

        return redirect()->route('peminjaman.index')
            ->with('success', 'Peminjaman berhasil diajukan.');
    }

    // Detail
    public function show(Peminjaman $peminjaman)
    {
        return view('peminjaman.show', compact('peminjaman'));
    }

    // Form edit
    public function edit(Peminjaman $peminjaman)
    {
        $barang = barang::all();

        return view('peminjaman.edit', compact('peminjaman', 'barang'));
    }

    // Update
    public function update(Request $request, peminjaman $peminjaman)
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'tanggal_peminjaman' => 'required|date',
            'tanggal_pengembalian' => 'nullable|date|after_or_equal:tanggal_peminjaman',
            'status' => 'required|in:Menunggu,Disetujui,Ditolak,Selesai'
        ]);

        $peminjaman->update($request->all());

        return redirect()->route('peminjaman.index')
            ->with('success', 'Data berhasil diperbarui.');
    }

    // Hapus
    public function destroy(Peminjaman $peminjaman)
    {
        $peminjaman->delete();

        return redirect()->route('peminjaman.index')
            ->with('success', 'Data berhasil dihapus.');
    }

    // Admin menyetujui peminjaman
    public function setujui(Peminjaman $peminjaman)
    {
        $barang = barang::findOrFail($peminjaman->barang_id);

        if ($barang->jumlah < $peminjaman->jumlah) {

            return back()->with(
                'error',
                'Stok barang tidak mencukupi.'
            );
        }
        $barang->decrement('jumlah', $peminjaman->jumlah);

        $peminjaman->update([
            'status' => 'Disetujui'
        ]);

        return back()->with('success', 'Peminjaman disetujui.');
    }

    // Admin menolak
    public function tolak(Peminjaman $peminjaman)
    {
        $peminjaman->update([
            'status' => 'Ditolak'
        ]);

        return back()->with('success', 'Peminjaman ditolak.');
    }

    // Barang dikembalikan
    public function selesai(Peminjaman $peminjaman)
    {
        $barang = barang::findOrFail($peminjaman->barang_id);

        $barang->increment('jumlah', $peminjaman->jumlah);
        
        $peminjaman->update([
            'status' => 'Selesai'
        ]);

        return back()->with('success', 'Barang telah dikembalikan.');
    }
}