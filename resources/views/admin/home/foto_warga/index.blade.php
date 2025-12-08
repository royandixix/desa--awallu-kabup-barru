    @extends('admin.layouts.app')

    @section('content')
    <a href="{{ route('admin.home.foto_warga.create') }}" class="btn btn-primary mb-3">Tambah Foto</a>

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
            @foreach($fotos as $foto)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    <img src="{{ asset('storage/' . $foto->gambar) }}" width="120">
                </td>
                <td>
                    <a href="{{ route('admin.home.foto_warga.edit', $foto->id) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('admin.home.foto_warga.destroy', $foto->id) }}" 
                        method="POST" 
                        style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus foto?')">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endsection
