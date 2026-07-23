@extends('layouts.app')

@section('content')

<h2>Barang</h2>

<a href="{{ route('barang.create') }}">
Tambah
</a>

<table border="1">

<tr>

<th>ID</th>

<th>Nama</th>

<th>Aksi</th>

</tr>

@foreach($barangs as $barang)

<tr>

<td>{{ $barang->id }}</td>

<td>{{ $barang->nama_barang }}</td>

<td>

<a href="{{ route('barang.edit',$barang) }}">
Edit
</a>

<form action="{{ route('barang.destroy',$barang) }}"
method="POST">

@csrf
@method('DELETE')

<button>Hapus</button>

</form>

</td>

</tr>

@endforeach

</table>

@endsection