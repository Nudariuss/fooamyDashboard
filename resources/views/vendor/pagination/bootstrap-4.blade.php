@if ($paginator->hasPages())
    <nav>
        <ul class="pagination justify-content-end mb-0">
            {{-- Tombol Previous --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link">&laquo;</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a>
                </li>
            @endif

            {{-- Pagination Elemen --}}
            @foreach ($elements as $element)
                {{-- Tiga Titik --}}
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link">{{ $element }}</span>
                    </li>
                @endif

                {{-- Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        {{-- Tampilkan halaman pertama, terakhir, dan halaman di sekitar halaman aktif --}}
                        @if ($page == $paginator->currentPage() || $page == 1 || $page == $paginator->lastPage() || abs($paginator->currentPage() - $page) <= 2)
                            @if ($page == $paginator->currentPage())
                                <li class="page-item active" aria-current="page">
                                    <span class="page-link">{{ $page }}</span>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endif
                        @elseif ($page == 2 || $page == $paginator->lastPage() - 1)
                            {{-- Tambahkan ... untuk lompatan halaman --}}
                            <li class="page-item disabled" aria-disabled="true">
                                <span class="page-link">...</span>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Tombol Next --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link">&raquo;</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
