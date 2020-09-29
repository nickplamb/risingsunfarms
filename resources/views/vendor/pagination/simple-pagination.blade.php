@if ($paginator->hasPages())
    <nav>
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li aria-disabled="true">
                    <span class="button disabled">@lang('pagination.previous')</span>
                </li>
            @else
                <li>
                    <a class="button" href="{{ $paginator->previousPageUrl() }}" rel="prev">@lang('pagination.previous')</a>
                </li>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a class="button" href="{{ $paginator->nextPageUrl() }}" rel="next">@lang('pagination.next')</a>
                </li>
            @else
                <li aria-disabled="true">
                    <span class="button disabled">@lang('pagination.next')</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
