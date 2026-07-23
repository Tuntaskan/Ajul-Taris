@extends('layouts.app')

@section('content')

<a href="{{ route('user.create') }}">
Tambah User
</a>

<table border="1">

@foreach($users as $user)

<tr>

<td>{{ $user->name }}</td>

<td>{{ $user->role }}</td>

<td>

<a href="{{ route('user.edit',$user) }}">
Edit
</a>

</td>

</tr>

@endforeach

</table>

@endsection