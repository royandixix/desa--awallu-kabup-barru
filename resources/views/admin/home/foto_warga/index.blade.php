@extends('admin.layouts.app')

@section('title', 'Daftar Foto Warga')

@section('content')
<div class="container py-4">

    <a href="{{ route('admin.home.foto_warga.create') }}" class="btn btn-primary mb-3">
        Tambah Foto
    </a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($fotos as $foto)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    <img src="{{ asset($foto->gambar) }}" 
                         width="120" 
                         style="object-fit:cover; border-radius:4px;">
                </td>
                <td>
                    <a href="{{ route('admin.home.foto_warga.edit', $foto->id) }}" 
                       class="btn btn-warning btn-sm">
                       Edit
                    </a>

                    <form action="{{ route('admin.home.foto_warga.destroy', $foto->id) }}" 
                          method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" 
                                onclick="return confirm('Hapus foto ini?')">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="text-center text-muted">Belum ada foto</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
