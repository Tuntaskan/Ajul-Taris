@extends('layouts.app')

@section('content')

<h2>Ajukan Peminjaman</h2>

<form action="{{ route('peminjaman.store') }}" method="POST">

    @csrf

    <label>Barang</label>

    <select name="barang_id">

        @foreach($barang as $item)

            <option value="{{ $item->id }}">

                {{ $item->nama_barang }}

                (Stok : {{ $item->jumlah }})

            </option>

        @endforeach

    </select>

    <br><br>

    <label>Jumlah</label>

    @foreach($barang as $item)
    <input
        type="number"
        name="jumlah"
        min="1"
        max="{{ $item->jumlah }}"
        required>
    @endforeach
    <br><br>

    <label>Tanggal Peminjaman</label>

    <input
        type="datetime-local"
        name="tanggal_peminjaman"
        required>

    <br><br>

    <label>Tanggal Pengembalian</label>

    <input
        type="datetime-local"
        name="tanggal_pengembalian">

    <br><br>

    <button type="submit">

        Ajukan

    </button>

</form>

@endsection