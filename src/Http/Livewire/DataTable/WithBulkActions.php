<?php

namespace App\Http\Livewire\DataTable;

trait WithBulkActions
{
    public $selectPage = false;
    public $selectAll = false;
    public $selected = [];

    public function updatedSelected()
    {
        $this->selectAll = false;
        $this->selectedCount >= 30 ? $this->selectPage = true : $this->selectPage = false;
    }

    public function updatedSelectPage($value)
    {
        $this->selectAll = false;
        if ($value) return $this->selectPageRows();
        $this->selected = [];
    }

    public function getSelectedCountProperty()
    {
        return count($this->selected);
    }

    public function selectPageRows()
    {
        $this->selected = $this->rows->pluck('id')->map(fn($id) => (string) $id);
    }

    public function selectAll()
    {
        $this->selectPage = true;
        $this->selectAll = true;
        if ($this->selectAll) $this->selectPageRows();
    }

    public function resetSelected()
    {
        $this->selectPage = false;
        $this->selectAll = false;
        $this->selected = [];
    }
}
