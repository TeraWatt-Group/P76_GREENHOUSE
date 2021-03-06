<div>
    <div class="row mb-3">
        <div class="col-12">
            <div class="d-flex align-content-start align-items-end">
                <h3 class="mb-0 pr-3">{{ __('Користувачі') }}</h3>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-6">
            <div class="d-flex justify-content-start">
                <div class="input-group w-50">
                    <x-input.input wire:model.debounce.300ms="search" type="text" class="form-control" placeholder="{{ __('green.search') }}"/>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="d-flex justify-content-end">
                <a role="button" aria-pressed="true" class="btn btn-primary ms-2" role="button" href="{{ route('admin.users.create') }}" aria-label="{{ __('Add') }}">
                    {{ __('Add') }}
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card mb-3">
                <div class="card-body p-0">
                    <div wire:loading.delay class="preloader">
                        <div class="d-flex justify-content-center align-items-center h-100"><div class="spinner-grow" role="status"></div></div>
                    </div>
                    <x-table>
                        <x-slot name="head">
                            <x-table.header class="w-0">
                                <x-input.checkbox wire:model="selectPage" />
                            </x-table.header>
                            <x-table.header sortable wire:click="sortBy('name')" :direction="$sorts['name'] ?? null" class="w-15">Користувач</x-table.header>
                            <x-table.header sortable wire:click="sortBy('email')" :direction="$sorts['email'] ?? null" class="w-20">Email</x-table.header>
                            <x-table.header sortable wire:click="sortBy('username')" :direction="$sorts['username'] ?? null" class="w-15">Ім'я</x-table.header>
                            <x-table.header>Группа</x-table.header>
                            <x-table.header class="w-15">Активність</x-table.header>
                        </x-slot>
                        <x-slot name="body">
                            @forelse ($rows as $row)
                                <x-table.row>
                                    <x-table.cell>
                                        @if($row->isAdmin())
                                            <x-input.checkbox wire:model="selected" value="{{ $row->id }}" disabled />
                                        @else
                                            <x-input.checkbox wire:model="selected" value="{{ $row->id }}"/>
                                        @endif
                                    </x-table.cell>
                                    <x-table.cell><a href="{{ route('admin.users.edit', $row->id) }}" aria-label="{{ __('Edit') }}">{{ $row->fullname }}</a></x-table.cell>
                                    <x-table.cell>{{ $row->email }}</x-table.cell>
                                    <x-table.cell>{{ $row->username }}</x-table.cell>
                                    <x-table.cell>

                                    </x-table.cell>
                                    <x-table.cell>
                                        @if ($row->latest_login ?? [])
                                            {{ $row->latest_login->expires_at }}
                                        @endif
                                    </x-table.cell>
                                </x-table.row>
                            @empty
                                <x-table.row>
                                    <x-table.cell colspan="7" class="text-center p-3">
                                        {{ __('No data found.') }}
                                    </x-table.cell>
                                </x-table.row>
                            @endforelse
                        </x-slot>
                    </x-table>
                </div>
                <div class="card-footer">
                    {{ $rows->onEachSide(1)->links('pagination.lw-traditional') }}
                </div>
            </div>
            <div class="d-flex justify-content-start">
                <div>
                    @unless ($selectAll)
                        <span class="btn btn-link me-3 ps-0">{{ $this->selectedCount }} {{ __('selected') }}</span>
                        <button wire:click="selectAll" class="btn btn-outline-primary me-2" aria-label="{{ __('Select all') }}">Select all</button>
                    @else
                        <span class="btn btn-link me-3 ps-0">{{ $rows->total() }} {{ __('selected') }}</span>
                        <button class="btn btn-primary me-2" aria-label="{{ __('main.edit') }}" disabled>Select all</button>
                    @endif
                </div>
                    <div class="btn-group me-2">
                        <button type="button" class="btn btn-outline-primary">{{ __('Export') }}</button>
                        <button type="button" class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a wire:click="ecportCsv" class="dropdown-item" href="#">CSV</a></li>
                            <li><a class="dropdown-item" href="#">XML</a></li>
                            <li><a wire:click="ecportJson" class="dropdown-item" href="#">JSON</a></li>
                        </ul>
                    </div>
                    <button class="btn btn-outline-primary me-2 {{ $this->selectedCount ? '' : 'disabled' }}" type="button" wire:click="$toggle('showDeleteModal')" wire:loading.attr="disabled" aria-label="{{ __('Delete') }}" {{ $this->selectedCount ? '' : 'disabled' }}>
                        {{ __('Delete') }}
                    </button>
            </div>
        </div>
    </div>

    <form wire:submit.prevent="deleteSelected">
        @csrf
        <x-modal.dialog-modal wire:model="showDeleteModal">
            <x-slot name="title">{{ __('Delete user?') }}</x-slot>
            <x-slot name="content">{{ __('Delete user?') }}</x-slot>
            <x-slot name="footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                <button type="submit" class="btn btn-success">{{ __('Delete') }}</button>
            </x-slot>
        </x-modal.dialog-modal>
    </form>
</div>
