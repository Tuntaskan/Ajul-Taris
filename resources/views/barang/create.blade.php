@extends('layouts.app')

@section('content')

<h2>Tambah Barang</h2>

<form action="{{ route('barang.store') }}" method="POST">

@csrf

Kategori

<select name="kategori_id">

@foreach($kategori as $item)

<option value="{{$item->id}}">
{{$item->name}}
</option>

@endforeach

</select>

<br><br>

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

<select name="kondisi">

<option>Baik</option>
<option>Rusak Ringan</option>
<option>Rusak Berat</option>
<option>Hilang</option>

</select>

<br><br>

Lokasi

<input type="text" name="lokasi">

<br><br>

Tanggal Masuk

<input type="date" name="tanggal_masuk">

<br><br>

<button>Simpan</button>

</form>

@endsection