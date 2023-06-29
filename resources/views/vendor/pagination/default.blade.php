@if ($paginator->hasPages())
     <av class="nav_pagination" > 
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @i ($paginator->onFirstPage())
                <li class="disabled pages" aria-disabled="true" aria-label="@lang('pagination.previous') ">
                    <span aria-hidden="true">&lsaquo;</span>
               </li>
            @else
                <li class="pages">
                   <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                </li>
            @endif
 
            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dot" Separator --}}
                @if (is_string($element))
                    <li class="disabled pages" aria-disabled="true"><span>{{ $element }}</span></li>
                 @endif
    


                {{-- Array Of Links --}}
                 @if (is_array
    (
$element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li cl
ass="active pages" aria-current="page"><span>{{ $page }}</span></li>
                        @else
                            <li class="pages"><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif

                    @endforeach
                @endif
             @endforeach
    


            {{-- Next Page Link --}}
             @if ($pagin
    a
tor->hasMorePages())
                <li class="pages">
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                 </li>
    
             @else
                           <span aria-hid
    e
n="true">&rsaquo;</span>
                </li>
            @endif
         </ul>
    

    </nav>
    @endif
    