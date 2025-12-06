@extends('user.layouts.app')

@section('title', 'Struktur PKK')

@section('header_struktur')
    @include('user.partials.navbar')
    @include('user.partials.header_struktur')
@endsection

@section('content')
<div class="container mx-auto px-4 py-16 max-w-7xl">

    {{-- TITLE --}}
    <div class="mb-6 text-center">
        <h2 class="text-3xl font-bold text-gray-800">Struktur PKK Desa</h2>
        <p class="text-gray-500 mt-2">
            Berikut adalah daftar gambar struktur organisasi Tim Penggerak PKK Desa Lawallu
        </p>
    </div>

    {{-- TABLE --}}
    <div class="overflow-x-auto shadow-lg rounded-lg">
        <table id="pkkTable" class="table-auto w-full text-left border-collapse">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-3 border">No</th>
                    <th class="px-4 py-3 border">Gambar Struktur</th>
                </tr>
            </thead>
            <tbody>
                @forelse(\App\Models\Pkk::orderBy('id','DESC')->get() as $item)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 border">{{ $loop->iteration }}</td>
                        <td class="px-4 py-3 border">
                            <img 
                                src="{{ asset('pkk/' . $item->gambar) }}" 
                                alt="Struktur PKK" 
                                class="w-full h-auto rounded shadow"
                            />
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="px-4 py-3 border text-center text-gray-500">Belum ada gambar PKK.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>

<script>
    $(document).ready(function() {
        $('#pkkTable').DataTable({
            responsive: true,
            pageLength: 5,
            lengthChange: false,
            language: {
                emptyTable: "Belum ada gambar PKK"
            }
        });
    });
</script>
@endpush
