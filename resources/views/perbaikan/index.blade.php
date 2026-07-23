@extends('layouts.app')

@section('content')

<a href="{{ route('perbaikan.create') }}">
Tambah Perbaikan
</a>

@foreach($perbaikans as $perbaikan)

<p>

{{ $perbaikan->laporan->barang->nama_barang }}

|

{{ $perbaikan->status }}

|

<a href="{{ route('perbaikan.edit',$perbaikan) }}">
Edit
</a>

</p>

@endforeach

@endsection