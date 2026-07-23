@extends('layouts.app')

@section('content')

<form method="POST"
action="{{ route('kategori.update', $kategori) }}">

@csrf
@method('PUT')

Nama

<input name="name">

<button>Simpan</button>

</form>

@endsection