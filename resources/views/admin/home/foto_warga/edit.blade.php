@extends('admin.layouts.app')

@section('content')
<h3>Edit Foto Warga</h3>

<form action="{{ route('admin.home.foto_warga.update', $fotoWarga->id) }}" 
      method="POST" 
      enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Foto Baru</label>
        <input type="file" name="file" class="form-control">
        <small class="text-muted">Kosongkan jika tidak ingin mengganti foto.</small>
    </div>

    <div class="mb-3">
        <label>Foto Saat Ini</label><br>
        <img src="{{ asset('storage/' . $fotoWarga->gambar) }}" width="150">
    </div>

    <button type="submit" class="btn btn-success">Update</button>
</form>
@endsection
