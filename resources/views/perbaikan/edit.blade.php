@extends('layouts.app')

@section('content')

<h2>Edit Perbaikan</h2>

<form action="{{ route('perbaikan.update', $perbaikan->id) }}" method="POST">

@csrf
@method('PUT')

Laporan Kerusakan

<select name="laporankerusakan_id">
    @foreach($laporans as $laporan)
        <option value="{{ $laporan->id }}" {{ $perbaikan->laporankerusakan_id == $laporan->id ? 'selected' : '' }}>
            {{ $laporan->barang->nama_barang }} - {{ $laporan->tanggal_laporan }}
        </option>
    @endforeach
</select>

<br><br>

    Tanggal Perbaikan

    <input type="date" name="tanggal_perbaikan" value="{{ $perbaikan->tanggal_perbaikan }}">

    <br><br>

    Keterangan

    <textarea name="keterangan">{{ $perbaikan->keterangan }}</textarea>

    <br><br>

    Status

    <select name="status">
        <option value="Menunggu" {{ $perbaikan->status == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
        <option value="Proses" {{ $perbaikan->status == 'Proses' ? 'selected' : '' }}>Proses</option>
        <option value="Selesai" {{ $perbaikan->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
        <option value="Tidak Dapat Diperbaiki" {{ $perbaikan->status == 'Tidak Dapat Diperbaiki' ? 'selected' : '' }}>Tidak Dapat Diperbaiki</option>
    </select>
    <br><br>

<button>Simpan</button>

</form>

@endsection