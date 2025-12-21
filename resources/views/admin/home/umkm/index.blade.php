@extends('admin.layouts.app')

@section('title', 'Data UMKM')

@section('content')
<div class="container py-4">
    <h3 class="mb-4">Daftar UMKM</h3>

    {{-- Tombol Tambah UMKM --}}
    <div class="mb-3">
        <a href="{{ route('admin.home.umkm.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah UMKM Baru
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle text-center">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Pengusaha</th>
                    <th>Foto Pengusaha</th>
                    <th>Nama Usaha</th>
                    <th>Jenis Usaha</th>
                    <th>Deskripsi</th>
                    <th>Alamat</th>
                    <th>Kontak</th>
                    <th>Harga</th>
                    <th>Foto UMKM</th>
                    <th>Kode UMKM</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($umkms as $index => $item)
                    <tr>
                        <td>{{ $umkms->firstItem() + $index }}</td>
                        <td>{{ $item->nama_pengusaha ?? '-' }}</td>
                        <td>
                            @if($item->foto_pengusaha)
                                <img src="{{ asset($item->foto_pengusaha) }}" class="img-thumbnail" style="width:60px; height:60px; object-fit:cover;">
                            @else
                                <span class="text-muted">Tidak ada</span>
                            @endif
                        </td>
                        <td>{{ $item->nama_usaha ?? '-' }}</td>
                        <td>{{ $item->jenis_usaha ?? '-' }}</td>
                        <td class="text-start">{{ $item->deskripsi ?? '-' }}</td>
                        <td class="text-start">{{ $item->alamat ?? '-' }}</td>
                        <td>{{ $item->kontak ?? '-' }}</td>
                        <td>
                            @if($item->harga)
                                Rp {{ number_format($item->harga, 0, ',', '.') }}
                            @else
                                <span class="text-muted">Tidak ada</span>
                            @endif
                        </td>
                        <td>
                            @if($item->foto)
                                <img src="{{ asset($item->foto) }}" class="img-thumbnail" style="width:60px; height:40px; object-fit:cover;">
                            @else
                                <span class="text-muted">Tidak ada</span>
                            @endif
                        </td>
                        <td>{{ $item->kode_umkm ?? '-' }}</td>
                        <td>
                            <div class="d-flex justify-content-center gap-1">
                                <a href="{{ route('admin.home.umkm.edit', $item) }}" class="btn btn-dark btn-sm" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.home.umkm.destroy', $item) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" title="Hapus" onclick="return confirm('Yakin ingin menghapus UMKM ini?')">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="12" class="text-center text-muted">Belum ada data UMKM</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-3">
        {{ $umkms->links() }}
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // Notifikasi sukses
    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '{{ session("success") }}',
        });
    @endif
</script>
@endpush
