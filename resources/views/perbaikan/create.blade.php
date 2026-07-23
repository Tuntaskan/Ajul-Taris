@extends('layouts.app')

@section('content')

<h2>Tambah Perbaikan</h2>

<form method="POST"
action="{{ route('perbaikan.store') }}">

@csrf

Laporan Kerusakan
<select name="laporankerusakan_id">
    @foreach($laporans as $item)
        <option value="{{ $item->id }}">{{ $item->barang->nama_barang }} - {{ $item->tanggal_laporan }}</option>
    @endforeach
</select>
<br><br>

Tanggal Perbaikan
<input type="date" name="tanggal_perbaikan">
<br><br>

Keterangan
<textarea name="keterangan"></textarea>
<br><br>

Status
<select name="status">
    <option value="Menunggu">Menunggu</option>
    <option value="Proses">Proses</option>
    <option value="Selesai">Selesai</option>
    <option value="Tidak Dapat Diperbaiki">Tidak Dapat Diperbaiki</option>
</select>
<br><br>

<button>Simpan</button>

</form>

@endsection