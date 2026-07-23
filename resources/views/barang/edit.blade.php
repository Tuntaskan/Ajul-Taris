@extends('layouts.app')

@section('content')

<h2>Edit Barang</h2>

<form action="{{ route('barang.update') }}" method="POST">

@csrf

Nama Barang

<input type="text" name="nama_barang">

<br><br>

Kode Barang

<input type="text" name="kode_barang">

<br><br>

Jumlah

<input type="number" name="jumlah">

<br><br>

Kondisi

<input type="text" name="kondisi">

<br><br>

Lokasi

<input type="text" name="lokasi">

<br><br>

Kategori

<select name="kategori_id">

@foreach($kategori as $item)

<option value="{{ $item->id }}" {{ $barang->kategori_id == $item->id ? 'selected' : '' }}>
{{$item->name}}
</option>

@endforeach

</select>

<br><br>

<button>Simpan</button>

</form>

@endsection