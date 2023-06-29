@if ($paginator->hasPages())
    <div style="text-align: center; padding-top: 10px">
        <div class="content_count" 
        style=" color: white;
                font-weight: 600;
                background-color: rgba(133, 178, 144, 1);
                width: max-content;
                border-radius: 6px;
                padding: 10px 10px;
                position: absolute;
                left: 50%;
                transform: translateX(-50%)">
            <p>{{ $paginator->perPage() * $paginator->currentPage() - $paginator->perPage() + 1 }}
                -
                {{ $paginator->perPage() * $paginator->currentPage() - $paginator->perPage() + $paginator->count() }}
            </p>
            <p>Total : {{ $paginator->total() }}</p>
        </div>
    </div>
    <div>
        <nav class="pagination_content">
            <ul class="pagination">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li class="disabled pages" aria-disabled="true" aria-label="@lang('pagination.previous') ">
                        <span aria-hidden="true">&lsaquo;</span>
                    </li>
                @else
                    <li class="pages">
                        <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                           aria-label="@lang('pagination.previous')">&lsaquo;</a>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li class="disabled pages" aria-disabled="true"><span>{{ $element }}</span></li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="active pages" aria-current="page"><span>{{ $page }}</span></li>
                            @else
                                <li class="pages"><a href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li class="pages">
                        <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                    </li>
                @else
                    <li class="disabled pages" aria-disabled="true" aria-label="@lang('pagination.next')">
                        <span aria-hidden="true">&rsaquo;</span>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
@endif
