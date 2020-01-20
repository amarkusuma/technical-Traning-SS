@extends('layouts.app')

@section('content')
<h4> Tabel user</h4>

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

<th>Action</th>
</thead>
<tbody>
@foreach ($user as $p)
<tr>
<td>{{ $p->id }}</td>
<td>{{ $p->name }}</td>
<td>{{ $p->email }}</td>
<td>{{ $p->alamat }}</td>
{{-- <td><a href="{{ route('user.show', $p->id) }}"> --}}
{{-- {{ $p->user }}</a></td> --}}
<td>

<a href="{{ route('user.edit', $p->id) }}" class="btn btn-warning btn-sm">Ubah</a>

</td>
</tr>
@endforeach
</tbody>
</table>
@endsection
