@if ($paginator->hasPages() && $paginator->count() > 0)
    <div class="d-flex justify-content-between">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="fw-bold disabled"><span>{{ __('pagination.previous') }}</span></span>
        @else
            <span class="fw-bold"><a href="{{ $paginator->previousPageUrl() }}" rel="prev">{{ __('pagination.previous') }}</a></span>
        @endif

        {{ $paginator->currentPage() * $paginator->perPage() - $paginator->perPage() + 1 }} - {{ ($paginator->currentPage() * $paginator->perPage()) - ($paginator->perPage() - $paginator->count()) }} {{ __('pagination.of') }} {{ $paginator->total() }}

        {{-- Next Page link --}}
        @if ($paginator->hasMorePages())
            <span class="fw-bold"><a href="{{ $paginator->nextPageUrl() }}" rel="next">{{ __('pagination.next') }}</a></span>
        @else
            <span class="fw-bold disabled"><span>{{ __('pagination.next') }}</span></span>
        @endif
    </div>
@endif