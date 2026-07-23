@extends('layouts.app')

@section('content')

<form method="POST"
action="{{ route('user.store') }}">

@csrf

Name
<input name="name">
<br> <br>

Username
<input name="username">
<br> <br>

Role
<select name="role">

<option>superadmin</option>
<option>admin_sarpras</option>
<option>staff</option>
<option>guru</option>
<option>siswa</option>
<option>teknisi</option>

</select>
<br> <br>

Password
<input type="password"
name="password">
<br> <br>

Konfirmasi Password 
<input type="password" name="password_confirmation"> <br><br>

<button>Simpan</button>

</form>

@endsection