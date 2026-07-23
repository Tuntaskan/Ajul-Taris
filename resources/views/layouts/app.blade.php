<!DOCTYPE html>
<html>
<head>
    <title>Sarpras</title>
</head>
<body>

<h2>Aplikasi Sarpras</h2>

@if(Auth::check())

    Login sebagai :
    <b>{{ Auth::user()->name }}</b>

    ({{ Auth::user()->role }})

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button>Logout</button>
    </form>

    <hr>

    <a href="/dashboard">Dashboard</a>

    @if(Auth::user()->role=='admin_sarpras')
        |
        <a href="/barang">Barang</a>
        |
        <a href="/kategori">Kategori</a>
    @endif

    @if(Auth::user()->role=='superadmin')
        |
        <a href="/user">User</a>
    @endif

    @if(Auth::user()->role=='teknisi')
        |
        <a href="/perbaikan">Perbaikan</a>
    @endif

    <a href="/laporankerusakan">Laporan</a>
    <a href="/peminjaman">Peminjaman</a>

@endif

<hr>

@if(session('success'))
    <p style="color:green">
        {{ session('success') }}
    </p>
@endif

@yield('content')

</body>
</html>