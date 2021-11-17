<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;
use App\Http\Livewire\DataTable\WithSorting;
use App\Http\Livewire\DataTable\WithBulkActions;

class Users extends Component
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

    public function deleteSelected()
    {
        (clone $this->rowsQuery)
            ->unless($this->selectAll, fn($query) => $query->whereKey($this->selected))
            // ->whereDoesntHave('roles', fn($query) => $query->where('name', 'super-admin'))
            ->delete();

        $this->resetSelected();
        $this->showDeleteModal = false;
    }

    public function getRowsQueryProperty()
    {
        $query = User::query()
            ->with('latest_login')
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

        return view('livewire.admin.users', [
            'rows' => $this->rows,
        ]);
    }

    public function ecportJson()
    {
        return response()->streamDownload(function() {
            echo User::whereKey($this->selected)->get()->toJson();
        }, 'test.json');
    }
}
