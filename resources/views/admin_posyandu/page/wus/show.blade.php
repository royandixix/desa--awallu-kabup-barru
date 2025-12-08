@extends('admin_posyandu.layouts.app')

@section('content')
<div class="container">
    <h1>Detail WUS</h1>

    <ul class="list-group">
        <li class="list-group-item"><strong>Nama:</strong> {{ $wus->nama }}</li>
        <li class="list-group-item"><strong>Alamat:</strong> {{ $wus->alamat }}</li>
        <li class="list-group-item"><strong>Umur:</strong> {{ $wus->umur }}</li>
        <li class="list-group-item"><strong>Dibuat:</strong> {{ $wus->created_at }}</li>
        <li class="list-group-item"><strong>Diperbarui:</strong> {{ $wus->updated_at }}</li>
    </ul>

    <a href="{{ route('admin_posyandu.wus.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
