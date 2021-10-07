<div>
    <div class="d-flex justify-content-between">
        @if ($paginator->count() > 0)
            <div>
                @if ($paginator->hasPages())
                    <div class="d-flex justify-content-end">
                        <nav>
                            <ul class="pagination mb-0">
                                @if ($paginator->onFirstPage())
                                    <li class="page-item disabled" aria-disabled="true">
                                        <span class="page-link">@lang('pagination.previous')</span>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <button type="button" class="page-link" wire:click="previousPage" wire:loading.attr="disabled" rel="prev">@lang('pagination.previous')</button>
                                    </li>
                                @endif

                                @if ($paginator->hasMorePages())
                                    <li class="page-item">
                                        <button type="button" class="page-link" wire:click="nextPage" wire:loading.attr="disabled" rel="next">@lang('pagination.next')</button>
                                    </li>
                                @else
                                    <li class="page-item disabled" aria-disabled="true">
                                        <span class="page-link">@lang('pagination.next')</span>
                                    </li>
                                @endif
                            </ul>
                        </nav>
                    </div>
                @endif
            </div>
            <div class="pt-1">{{ $paginator->currentPage() * $paginator->perPage() - $paginator->perPage() + 1 }} - {{ ($paginator->currentPage() * $paginator->perPage()) - ($paginator->perPage() - $paginator->count()) }} {{ __('pagination.of') }} {{ $paginator->total() }}</div>
        @else
            <div class="pt-1">{{ $paginator->currentPage() * $paginator->perPage() - $paginator->perPage() }} - {{ ($paginator->currentPage() * $paginator->perPage()) - ($paginator->perPage() - $paginator->count()) }} {{ __('pagination.of') }} {{ $paginator->total() }}</div>
        @endif
    </div>
</div>
