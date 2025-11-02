@php
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

$path = public_path('img/user/galeri');
$files = collect(File::files($path))->map(function ($file) {
    $name = pathinfo($file, PATHINFO_FILENAME);
    return [
        'file' => basename($file),
        'title' => ucwords(str_replace('_', ' ', $name)),
        'desc' => 'Dokumentasi kegiatan ' . ucwords(str_replace('_', ' ', $name)) . ' yang dilaksanakan di Desa Lawallu.'
    ];
});

$page = request()->get('page', 1);
$perPage = 6;
$total = count($files);
$paginated = $files->forPage($page, $perPage);
$totalPages = ceil($total / $perPage);
@endphp

<section id="galeri" class="bg-gray-50 py-16">
  <div class="max-w-[1500px] mx-auto px-3 md:px-6 lg:px-8">

    @if ($paginated->count() > 0)
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach ($paginated as $item)
          <div class="bg-white shadow-md hover:shadow-xl transition-all duration-400 overflow-hidden group">
            <a href="{{ route('user.galeri.detail', ['filename' => $item['file']]) }}" class="block">
              <div class="relative">
                <img src="{{ asset('img/user/galeri/' . $item['file']) }}"
                     alt="{{ $item['title'] }}"
                     class="w-full h-96 object-cover object-center group-hover:scale-105 transition-transform duration-700 ease-in-out">
              </div>
              <div class="p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-2 group-hover:text-emerald-700 transition-colors">
                  {{ $item['title'] }}
                </h3>
                <p class="text-gray-600 text-sm leading-relaxed">
                  {{ Str::limit($item['desc'], 85, '...') }}
                </p>
              </div>
            </a>
          </div>
        @endforeach
      </div>

      {{-- Pagination --}}
      <div class="flex justify-center items-center mt-14 space-x-2">
        @if ($page > 1)
          <a href="{{ url()->current() }}?page={{ $page - 1 }}"
             class="px-3 py-2 bg-white border border-gray-300 text-gray-700 hover:bg-gray-100">
            &laquo;
          </a>
        @endif

        @for ($i = 1; $i <= $totalPages; $i++)
          <a href="{{ url()->current() }}?page={{ $i }}"
             class="px-4 py-2 border transition-all duration-300 
             {{ $i == $page ? 'bg-emerald-600 text-white border-emerald-600' : 'bg-white text-emerald-700 hover:bg-emerald-50 border-emerald-400' }}">
            {{ $i }}
          </a>
        @endfor 

        @if ($page < $totalPages)
          <a href="{{ url()->current() }}?page={{ $page + 1 }}"
             class="px-3 py-2 bg-white border border-gray-300 text-gray-700 hover:bg-gray-100">
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
