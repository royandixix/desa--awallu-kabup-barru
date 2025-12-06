@extends('admin.layouts.app')
@section('title', 'Daftar Pengaduan')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Daftar Pengaduan</h1>

    @if(session('success'))
        <div class="mb-4 p-4 bg-green-500 text-white rounded">{{ session('success') }}</div>
    @endif

    <table class="w-full table-auto border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-100">
                <th class="border px-4 py-2">#</th>
                <th class="border px-4 py-2">Nama</th>
                <th class="border px-4 py-2">No HP</th>
                <th class="border px-4 py-2">Kategori</th>
                <th class="border px-4 py-2">Pesan</th>
                <th class="border px-4 py-2">Foto</th>
                <th class="border px-4 py-2">Status</th>
                <th class="border px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pengaduans as $pengaduan)
                <tr>
                    <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="border px-4 py-2">{{ $pengaduan->nama }}</td>
                    <td class="border px-4 py-2">{{ $pengaduan->no_hp }}</td>
                    <td class="border px-4 py-2">{{ $pengaduan->kategori }}</td>
                    <td class="border px-4 py-2">{{ \Illuminate\Support\Str::limit($pengaduan->pesan, 50) }}</td>
                    <td class="border px-4 py-2">
                        @if($pengaduan->foto)
                            <img src="{{ asset($pengaduan->foto) }}" alt="foto" class="w-20 h-20 object-cover rounded">
                        @else
                            -
                        @endif
                    </td>
                    <td class="border px-4 py-2">
                        <form action="{{ route('admin.pengaduan.updateStatus', $pengaduan->id) }}" method="POST">
                            @csrf
                            <select name="status" class="border rounded px-2 py-1" onchange="this.form.submit()">
                                <option value="pending" {{ $pengaduan->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="diproses" {{ $pengaduan->status == 'diproses' ? 'selected' : '' }}>Diproses</option>
                                <option value="selesai" {{ $pengaduan->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                            </select>
                        </form>
                    </td>
                    <td class="border px-4 py-2 flex gap-2">
                        <a href="{{ route('admin.pengaduan.show', $pengaduan->id) }}" class="px-2 py-1 bg-blue-500 text-white rounded">Detail</a>

                        <form action="{{ route('admin.pengaduan.destroy', $pengaduan->id) }}" method="POST" onsubmit="return confirm('Yakin ingin dihapus?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-2 py-1 bg-red-500 text-white rounded">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
