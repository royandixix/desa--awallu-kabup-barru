@extends('admin_posyandu.layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-3">Data Balita</h2>

    <a href="{{ route('admin_posyandu.balita.create') }}" class="btn btn-primary mb-3">
        + Tambah Balita
    </a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Balita</th>
                <th>Tanggal Lahir</th>
                <th>JK</th>
                <th>Umur</th>
                <th>Nama Ibu</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama_balita }}</td>
                <td>{{ $item->tanggal_lahir }}</td>
                <td>{{ $item->jenis_kelamin }}</td>
                <td>{{ $item->umur }}</td>
                <td>{{ $item->nama_ibu }}</td>
                <td>{{ $item->alamat }}</td>
                <td>
                    <a href="{{ route('admin_posyandu.balita.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    
                    <form action="{{ route('admin_posyandu.balita.destroy', $item->id) }}" method="POST" class="d-inline-block">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8" class="text-center">Belum ada data</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
