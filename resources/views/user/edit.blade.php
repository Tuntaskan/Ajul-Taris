@extends('layouts.app')

@section('content')

<h2>Edit User</h2>
    
<form action="{{ route('user.update', $user->id) }}" method="POST">

@csrf
@method('PUT')

Nama

<input type="text" name="name" value="{{ $user->name }}">

<br><br>

Username

<input type="text" name="username" value="{{ $user->username }}">

<br><br>

Role

<select name="role">
    <option value="superadmin" {{ $user->role == 'superadmin' ? 'selected' : '' }}>Super Admin</option>
    <option value="admin_sarpras" {{ $user->role == 'admin_sarpras' ? 'selected' : '' }}>Admin Sarpras</option>
    <option value="staff" {{ $user->role == 'staff' ? 'selected' : '' }}>Staff</option>
    <option value="guru" {{ $user->role == 'guru' ? 'selected' : '' }}>Guru</option>
    <option value="siswa" {{ $user->role == 'siswa' ? 'selected' : '' }}>Siswa</option>
    <option value="teknisi" {{ $user->role == 'teknisi' ? 'selected' : '' }}>Teknisi</option>
</select>

<br><br>

Password

<input type="password" name="password">

<br><br>

Confirm Password

<input type="password" name="password_confirmation">

<br><br>

<button>Simpan</button>

</form>

@endsection