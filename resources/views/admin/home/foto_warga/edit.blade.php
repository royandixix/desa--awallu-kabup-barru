@extends('admin.layouts.app')

@section('content')
<h3>Edit Foto Bersama Warga</h3>

<form action="{{ route('admin.home.foto_warga.update', $fotoWarga->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Judul</label>
        <input type="text" name="judul" class="form-control" value="{{ $fotoWarga->judul }}" required>
    </div>
    <div class="mb-3">
        <label>Foto</label>
        <input type="file" name="file" class="form-control">
        <small>Biarkan kosong jika tidak ingin mengganti foto</small><br>
        <img src="{{ $fotoWarga->fileUrl }}" width="150">
    </div>
    <button type="submit" class="btn btn-success">Update</button>
</form>
@endsection


