@extends('layouts.app')

@section('content')

<h3>Dashboard</h3>

Selamat datang
{{ Auth::user()->name }}

<form action="{{ route('logout') }}" method="POST">
    @csrf
    <button>Logout</button>
</form>

@endsection