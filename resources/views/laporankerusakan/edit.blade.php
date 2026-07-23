@extends('layouts.app')

@section('content')

<h2>Edit Laporan Kerusakan</h2>

<form action="{{ route('laporankerusakan.update', $laporankerusakan->id) }}" method="POST">

@csrf
@method('PUT')

Barang

<select name="barang_id">
    @foreach($barang as $item)
        <option value="{{ $item->id }}" {{ $laporankerusakan->barang_id == $item->id ? 'selected' : '' }}>
            {{ $item->nama_barang }}
        </option>
    @endforeach
</select>

<br><br>

Tanggal Laporan

<input type="date" name="tanggal_laporan" value="{{ $laporankerusakan->tanggal_laporan }}">

<br><br>

Keterangan

<textarea name="keterangan">{{ $laporankerusakan->keterangan }}</textarea>

<br><br>

Status

<select name="status">
    <option value="Menunggu" {{ $laporankerusakan->status == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
    <option value="Proses" {{ $laporankerusakan->status == 'Proses' ? 'selected' : '' }}>Proses</option>
    <option value="Selesai" {{ $laporankerusakan->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
</select>
<br><br>

<button>Simpan</button>

</form>

@endsection