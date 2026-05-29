@if ($paginator->hasPages())
    <nav aria-label="Pagination" class="aq-pagination">
        <ul class="pagination justify-content-center align-items-center mb-0" style="gap:6px;">
            {{-- Previous --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link">&laquo;</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="Previous">&laquo;</a>
                </li>
            @endif

            {{-- Page numbers --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="Next">&raquo;</a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link">&raquo;</span>
                </li>
            @endif
        </ul>

        <p class="text-center text-muted small mt-2 mb-0">
            {{ t('pagination.showing') }} {{ $paginator->firstItem() }} – {{ $paginator->lastItem() }} / {{ $paginator->total() }}
        </p>
    </nav>

    <style>
        .aq-pagination .page-link {
            min-width: 40px;
            height: 40px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0 12px;
            border: 1px solid #e5e5e5;
            color: #222;
            background: #fff;
            font-size: 14px;
            border-radius: 4px;
            text-decoration: none;
            line-height: 1;
        }
        .aq-pagination .page-item.active .page-link {
            background: #222;
            border-color: #222;
            color: #fff;
        }
        .aq-pagination .page-item.disabled .page-link {
            color: #bbb;
            background: #f7f7f7;
            cursor: not-allowed;
        }
        .aq-pagination .page-link svg { display: none; }
    </style>
@endif
