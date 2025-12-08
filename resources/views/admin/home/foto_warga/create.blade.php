@extends('admin.layouts.app')

@section('content')
<h3>Tambah Foto Warga</h3>

<form action="{{ route('admin.home.foto_warga.store') }}" 
      method="POST" 
      enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label>Foto</label>
        <input type="file" name="file" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-success">Simpan</button>
</form>
@endsection
