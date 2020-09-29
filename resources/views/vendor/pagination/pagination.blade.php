@if ($paginator->hasPages())
    <nav>
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="button disabled" aria-hidden="true">Prev</span>
                </li>
            @else
                <li>
                    <a class="button" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">Prev</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li aria-disabled="true"><span class="page">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li aria-current="page"><span class="page active">{{ $page }}</span></li>
                        @else
                            <li><a class="page" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a class="button" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">Next</a>
                </li>
            @else
                <li aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="button diabled" aria-hidden="true">Next</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
