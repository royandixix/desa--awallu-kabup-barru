@extends('admin_posyandu.layouts.app')

@section('title', 'Data Ibu Hamil')

@section('content')
<div class="container mt-4">
    <h1>Data Ibu Hamil</h1>

    <a href="{{ route('admin_posyandu.ibu-hamil.create') }}" class="btn btn-primary mb-3">Tambah Ibu Hamil</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Ibu</th>
                        <th>Umur Kehamilan (minggu)</th>
                        <th>Nama Suami</th>
                        <th>Alamat</th>
                        <th>No HP</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_ibu }}</td>
                            <td>{{ $item->umur_kehamilan }}</td>
                            <td>{{ $item->nama_suami }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>{{ $item->no_hp ?? '-' }}</td>
                            <td>
                                <a href="{{ route('admin_posyandu.ibu-hamil.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('admin_posyandu.ibu-hamil.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Data tidak tersedia</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
