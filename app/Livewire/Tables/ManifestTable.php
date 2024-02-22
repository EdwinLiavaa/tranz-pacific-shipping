<?php

namespace App\Livewire\Tables;

use App\Models\Manifest;
use Livewire\Component;
use Livewire\WithPagination;

class ManifestTable extends Component
{
    use WithPagination;

    public $perPage = 5;

    public $search = '';

    public $sortField = 'manifest_number';

    public $sortAsc = false;

    public function sortBy($field): void
    {
        if($this->sortField === $field)
        {
            $this->sortAsc = ! $this->sortAsc;

        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }

    public function render()
    {
        return view('livewire.tables.manifests-table', [
            'manifests' => Manifest::query()
                ->with(['manifests', 'manifest_number'])
                ->search($this->search)
                ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                ->paginate($this->perPage)
        ]);
    }
}
