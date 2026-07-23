@extends('layouts.app')

@section('content')

<h2>Kategori</h2>

<a href="{{ route('kategori.create') }}">
Tambah
</a>

@foreach($kategori as $item)

<p>

{{ $item->name }}

<a href="{{ route('kategori.edit',$item) }}">
Edit
</a>

</p>

@endforeach

@endsection