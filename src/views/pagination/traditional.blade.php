@if ($paginator->count() > 0)
<div class="row">
    <div class="col-md-10">
        @if ($paginator->hasPages())
            <ul class="pagination mb-0">
                @if ($paginator->onFirstPage())
                    <li class="disabled page-item"><span class=" page-link " aria-hidden="true">&laquo;</span></li>
                @else
                    <li class="{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }} page-item">
                        <a class=" page-link " href="{{ $paginator->previousPageUrl() }}" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                @endif

                @foreach ($elements as $element)
                    @if (is_string($element))
                        <li class="disabled page-item"><span class=" page-link ">{{ $element }}</span></li>
                    @endif

                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="active page-item"><span class=" page-link ">{{ $page }}</span></li>
                            @else
                                <li class="page-item"><a class=" page-link " href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                @if ($paginator->hasMorePages())
                    <li class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }} page-item">
                        <a href="{{ $paginator->url($paginator->currentPage()+1) }}" class="page-link" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                @else
                    <li class="disabled"><span class=" page-link ">&raquo;</span></li>
                @endif
            </ul>
        @endif
    </div>

    <div class="col-md-2 py-2">
        <div class="d-flex justify-content-end">
            {{ $paginator->currentPage() * $paginator->perPage() - $paginator->perPage() + 1 }} - {{ ($paginator->currentPage() * $paginator->perPage()) - ($paginator->perPage() - $paginator->count()) }} {{ __('pagination.of') }} {{ $paginator->total() }}
        </div>
    </div>
</div>
@endif