<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Category;
use Livewire\WithPagination;
use App\Http\Livewire\DataTable\WithSorting;
use App\Http\Livewire\DataTable\WithBulkActions;

class Categorys extends Component
{
    use WithPagination, WithSorting, WithBulkActions, WithFileUploads;

    public string $search = '';

    public $showDeleteModal = false;
    public $showForceDeleteModal = false;
    public $newImage;

    public function updatedSearch()
    {
        $this->resetPage();
        $this->resetSelected();
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
        $query = Category::query()
            ->leftJoin('category_description', 'category_description.category_id', 'category.category_id')
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

        return view('livewire.admin.categorys', [
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
