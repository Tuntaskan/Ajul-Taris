@extends('layouts.app')

@section('content')

<h2>Tambah Laporan Kerusakan</h2>

<form method="POST"
action="{{ route('laporankerusakan.store') }}">

@csrf

Barang

<select name="barang_id">
    @foreach($barang as $item)
        <option value="{{ $item->id }}">{{ $item->nama_barang }}</option>
    @endforeach
</select>

Tanggal Laporan

<input type="date" name="tanggal_laporan">

Keterangan

<textarea name="keterangan"></textarea>

<button>Simpan</button>

</form>

@endsection