@extends('layouts.app')

@section('content')

<form method="POST"
action="{{ route('kategori.store') }}">

@csrf

Nama

<input name="name">

<button>Simpan</button>

</form>

@endsection