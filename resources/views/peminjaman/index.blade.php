@extends('layouts.app')

@section('content')

@foreach($peminjamans as $pinjam)

<p>

{{ $pinjam->user->name }}

-

{{ $pinjam->barang->nama_barang }}

-

{{ $pinjam->status }}

</p>

<form method="POST"
action="{{ route('peminjaman.setujui',$pinjam) }}">

@csrf
@method('PUT')

<button>Setujui</button>

</form>

<form method="POST"
action="{{ route('peminjaman.tolak',$pinjam) }}">

@csrf
@method('PUT')

<button>Tolak</button>

</form>

<form method="POST"
action="{{ route('peminjaman.selesai',$pinjam) }}">

@csrf
@method('PUT')

<button>Selesai</button>

</form>

<hr>

@endforeach

@endsection