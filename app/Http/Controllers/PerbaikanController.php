<?php

namespace App\Http\Controllers;

use App\Models\perbaikan;
use App\Models\laporankerusakan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerbaikanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perbaikans = perbaikan::with(['laporan.barang', 'laporan.user', 'teknisi'])
                        ->latest()
                        ->get();

        return view('perbaikan.index', compact('perbaikans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $laporans = laporankerusakan::where('status', '!=', 'Selesai')->get();

        return view('perbaikan.create', compact('laporans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'laporankerusakan_id' => 'required|exists:laporankerusakans,id',
            'tanggal_perbaikan' => 'required|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_perbaikan',
            'keterangan' => 'nullable|string|max:255',
            'status' => 'required|in:Menunggu,Proses,Selesai,Tidak Dapat Diperbaiki',
        ]);

        $perbaikan = Perbaikan::create([
            'laporankerusakan_id' => $request->laporankerusakan_id,
            'teknisi_id' => Auth::id(),
            'tanggal_perbaikan' => $request->tanggal_perbaikan,
            'tanggal_selesai' => $request->tanggal_selesai,
            'keterangan' => $request->keterangan,
            'status' => $request->status,
        ]);

        $perbaikan->laporan->update([
            'status' => $request->status
        ]);

        return redirect()->route('perbaikan.index')
            ->with('success', 'Data perbaikan berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $perbaikan = perbaikan::findOrFail($id);

        $laporans = laporankerusakan::all();

        return view('perbaikan.edit', compact('perbaikan', 'laporans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'laporankerusakan_id' => 'required|exists:laporankerusakans,id',
            'tanggal_perbaikan' => 'required|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_perbaikan',
            'keterangan' => 'nullable|string|max:255',
            'status' => 'required|in:Menunggu,Proses,Selesai,Tidak Dapat Diperbaiki',
        ]);

        $perbaikan = perbaikan::findOrFail($id);

        $perbaikan->update([
            'laporankerusakan_id' => $request->laporankerusakan_id,
            'teknisi_id' => Auth::id(),
            'tanggal_perbaikan' => $request->tanggal_perbaikan,
            'tanggal_selesai' => $request->tanggal_selesai,
            'keterangan' => $request->keterangan,
            'status' => $request->status,
        ]);

        $perbaikan->laporan->update([
            'status' => $request->status
        ]);

        return redirect()->route('perbaikan.index')
            ->with('success', 'Data perbaikan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $perbaikan = perbaikan::findOrFail($id);

        $perbaikan->delete();

        return redirect()->route('perbaikan.index')
            ->with('success', 'Data perbaikan berhasil dihapus.');
    }
}