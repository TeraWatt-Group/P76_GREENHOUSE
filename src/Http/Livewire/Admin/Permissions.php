<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Livewire\WithPagination;
use App\Http\Livewire\DataTable\WithSorting;
use App\Http\Livewire\DataTable\WithBulkActions;

class Permissions extends Component
{
    use WithPagination, WithSorting, WithBulkActions;

    public string $search = '';

    public $showDeleteModal = false;
    public $showForceDeleteModal = false;

    public function updatedSearch()
    {
        $this->resetPage();
        $this->resetSelected();
    }

    public function forceDeleteSelected()
    {
        (clone $this->rowsQuery)
            ->unless($this->selectAll, fn($query) => $query->whereKey($this->selected))
            ->forceDelete();

        $this->resetSelected();
        $this->showForceDeleteModal = false;
    }

    public function deleteSelected()
    {
        (clone $this->rowsQuery)
            ->unless($this->selectAll, fn($query) => $query->whereKey($this->selected))
            ->delete();

        $this->resetSelected();
        $this->showDeleteModal = false;
    }

    public function getRowsQueryProperty()
    {
        $query = Permission::query()
            ->search('name', $this->search);

        return $this->applySorting($query);
    }

    public function getRowsProperty()
    {
        return $this->rowsQuery->paginate(30);
    }

    public function render()
    {
        if ($this->selectAll) {
            $this->selectPageRows();
        }

        return view('livewire.admin.permissions', [
            'rows' => $this->rows,
        ]);
    }
}
