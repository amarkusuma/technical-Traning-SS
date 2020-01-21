@extends('layouts.app')

@section('content')
<h4> Data Profile </h4>

@if ($message = Session::get('message'))
<div class="alert alert-success martop-sm">
<p>{{ $message }}</p>
</div>
@endif

<table class="table table-responsive martop-sm">
<thead>
<th>ID</th>
<th>Nama</th>
<th>Email</th>
<th>Alamat</th>
<th>Password</th>
<th>Action</th>
</thead>
<tbody>
{{-- @foreach ($user as $p) --}}
<tr>
<td>{{ $user->id }}</td>
<td>{{ $user->name }}</td>
<td>{{ $user->email }}</td>
<td>{{ $user->alamat }}</td>
<td>{{ $user->password }}</td>
{{-- <td><a href="{{ route('user.show', $p->id) }}"> --}}
{{-- {{ $p->user }}</a></td> --}}
<td>

<a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning btn-sm">Ubah</a>

</td>
</tr>
{{-- @endforeach --}}
</tbody>
</table>
@endsection
