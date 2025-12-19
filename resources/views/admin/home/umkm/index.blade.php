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
                    <th>Nama Usaha</th>
                    <th>Jenis Usaha</th>
                    <th>Deskripsi</th>
                    <th>Alamat</th>
                    <th>Kontak</th>
                    <th>Harga</th>
                    <th>Foto</th>
                    <th>Kode UMKM</th>
                    <th>Produk</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @forelse ($umkms as $index => $item)
                    <tr>
                        <td>{{ $umkms->firstItem() + $index }}</td>
                        <td>{{ $item->nama_pengusaha ?? '-' }}</td>
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
                                <img src="{{ asset('storage/' . $item->foto) }}" alt="Foto UMKM" class="img-thumbnail" style="width:60px; height:40px; object-fit:cover;">
                            @else
                                <span class="text-muted">Tidak ada</span>
                            @endif
                        </td>
                        <td>{{ $item->kode_umkm }}</td>
                        <td class="text-start">
                            @if($item->produk && $item->produk->count())
                                <ul class="list-unstyled mb-0">
                                    @foreach($item->produk as $produk)
                                        <li class="d-flex align-items-center gap-1">
                                            {{ $produk->nama ?? '-' }} 
                                            @if($produk->harga) - Rp {{ number_format($produk->harga,0,',','.') }} @endif
                                            @if($produk->foto)
                                                <img src="{{ asset('storage/' . $produk->foto) }}" alt="Produk" class="img-thumbnail" style="width:40px; height:30px; object-fit:cover;">
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <span class="text-muted">Tidak ada</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex justify-content-center gap-1">
                                {{-- EDIT BUTTON --}}
                                <a href="{{ route('admin.home.umkm.edit', $item) }}" class="btn btn-dark btn-sm" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>

                                {{-- DELETE BUTTON --}}
                                <form action="{{ route('admin.home.umkm.destroy', $item) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger btn-sm btn-delete" title="Hapus">
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
    document.querySelectorAll('.btn-delete').forEach(button => {
        button.addEventListener('click', function(){
            Swal.fire({
                title: 'Hapus UMKM?',
                text: "Data akan dihapus permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if(result.isConfirmed){
                    this.closest('form').submit();
                }
            });
        });
    });

    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '{{ session('success') }}',
        });
    @endif
</script>
@endpush
