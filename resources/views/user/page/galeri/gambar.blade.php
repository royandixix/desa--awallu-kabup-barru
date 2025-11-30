{{-- resources/views/user/page/galeri/galeri.blade.php --}}

@extends('user.layouts.app')

@section('title', 'Galeri Desa Lawallu')

@section('content')
<section id="galeri" class="bg-white py-16">
    <div class="max-w-[1500px] mx-auto px-3 md:px-6 lg:px-8">

        @if ($paginated->count() > 0)

            {{-- GRID GALERI TANPA CARD, TANPA SHADOW, TANPA BORDER-RADIUS --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">

                @foreach ($paginated as $item)
                    <div class="group">

                        <a href="{{ route('user.galeri.detail', ['filename' => $item['file']]) }}" class="block">

                            {{-- FOTO FULL, NO RADIUS, NO SHADOW, NYATU --}}
                            <div class="relative w-full h-96 overflow-hidden">
                                <img src="{{ asset('uploads/galeri/' . $item['file']) }}"
                                     alt="{{ $item['title'] }}"
                                     class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-700">
                            </div>

                            {{-- TEXT LETAK DI BAWAH, MINIMALIS --}}
                            <div class="mt-3">
                                <h3 class="text-lg font-semibold text-gray-900 group-hover:text-emerald-600 transition-colors">
                                    {{ $item['title'] }}
                                </h3>
                                <p class="text-gray-600 text-sm leading-relaxed mt-1">
                                    {{ Str::limit($item['desc'], 85, '...') }}
                                </p>
                            </div>

                        </a>
                    </div>
                @endforeach

            </div>

            {{-- PAGINATION --}}
            <div class="flex justify-center items-center mt-14 space-x-2">
                @if ($page > 1)
                    <a href="{{ url()->current() }}?page={{ $page - 1 }}"
                       class="px-3 py-2 bg-gray-100 border border-gray-300 text-gray-700 hover:bg-gray-200">
                        &laquo;
                    </a>
                @endif

                @for ($i = 1; $i <= $totalPages; $i++)
                    <a href="{{ url()->current() }}?page={{ $i }}"
                       class="px-4 py-2 border transition-all duration-300
                       {{ $i == $page ? 'bg-emerald-600 text-white border-emerald-600' : 'bg-gray-100 text-emerald-700 hover:bg-gray-200 border-emerald-400' }}">
                        {{ $i }}
                    </a>
                @endfor

                @if ($page < $totalPages)
                    <a href="{{ url()->current() }}?page={{ $page + 1 }}"
                       class="px-3 py-2 bg-gray-100 border border-gray-300 text-gray-700 hover:bg-gray-200">
                        &raquo;
                    </a>
                @endif
            </div>

        @else
            <p class="text-center text-gray-500 mt-10 text-lg">Belum ada foto di galeri.</p>
        @endif

    </div>
</section>

<script>
function scrollToGallery() {
    const galeriSection = document.getElementById('galeri');
    galeriSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
}
</script>
@endsection
