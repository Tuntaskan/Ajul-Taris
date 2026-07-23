@extends('layouts.app')

@section('content')

<a href="{{ route('laporankerusakan.create') }}">
Tambah
</a>

@foreach($laporans as $laporan)

<p>

{{ $laporan->barang->nama_barang }}

|

{{ $laporan->status }}

|

<a href="{{ route('laporankerusakan.edit',$laporan) }}">
Edit
</a>

</p>

@endforeach

@endsection