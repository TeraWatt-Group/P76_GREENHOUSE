<div>
    <div class="d-flex justify-content-between">
        @if ($paginator->count() > 0)
            <div>
                @if ($paginator->hasPages())
                <nav>
                    <ul class="pagination mb-0">
                        @if ($paginator->onFirstPage())
                            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                                <span class="page-link" aria-hidden="true">&lsaquo;</span>
                            </li>
                        @else
                            <li class="page-item">
                                <button type="button" dusk="previousPage" class="page-link" wire:click="previousPage" wire:loading.attr="disabled" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</button>
                            </li>
                        @endif

                        @foreach ($elements as $element)
                            @if (is_string($element))
                                <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
                            @endif

                            @if (is_array($element))
                                @foreach ($element as $page => $url)
                                    @if ($page == $paginator->currentPage())
                                        <li class="page-item active" wire:key="paginator-page-{{ $page }}" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                                    @else
                                        <li class="page-item" wire:key="paginator-page-{{ $page }}"><button type="button" class="page-link" wire:click="gotoPage({{ $page }})">{{ $page }}</button></li>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach

                        @if ($paginator->hasMorePages())
                            <li class="page-item">
                                <button type="button" dusk="nextPage" class="page-link" wire:click="nextPage" wire:loading.attr="disabled" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</button>
                            </li>
                        @else
                            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                                <span class="page-link" aria-hidden="true">&rsaquo;</span>
                            </li>
                        @endif
                    </ul>
                </nav>
                @endif
            </div>
            <div class="pt-1">{{ $paginator->currentPage() * $paginator->perPage() - $paginator->perPage() + 1 }} - {{ ($paginator->currentPage() * $paginator->perPage()) - ($paginator->perPage() - $paginator->count()) }} {{ __('pagination.of') }} {{ $paginator->total() }}</div>
        @else
            <div class="pt-1">{{ $paginator->currentPage() * $paginator->perPage() - $paginator->perPage() }} - {{ ($paginator->currentPage() * $paginator->perPage()) - ($paginator->perPage() - $paginator->count()) }} {{ __('pagination.of') }} {{ $paginator->total() }}</div>
        @endif
    </div>
</div>
