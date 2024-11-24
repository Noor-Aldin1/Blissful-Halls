@if ($paginator->hasPages())
    <div class="col-lg-12 col-md-12">
        <div class="pagination-area">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <span class="prev page-numbers disabled">
                    <i class="bx bx-chevrons-left"></i>
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="prev page-numbers">
                    <i class="bx bx-chevrons-left"></i>
                </a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span class="page-numbers disabled">{{ $element }}</span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="page-numbers current" aria-current="page">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}" class="page-numbers">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="next page-numbers">
                    <i class="bx bx-chevrons-right"></i>
                </a>
            @else
                <span class="next page-numbers disabled">
                    <i class="bx bx-chevrons-right"></i>
                </span>
            @endif
        </div>
    </div>
@endif
