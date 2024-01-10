<?php

namespace App\Livewire\PowerGrid;

use App\Models\Manifests;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridColumns;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class ManifestsTable extends PowerGridComponent
{
    public function setUp(): array
    {
        //$this->showCheckBox();

        return [

        ];
    }

    public function datasource(): Builder
    {

    }

    public function addColumns(): PowerGridColumns
    {

    }

    public function columns(): array
    {
        return [

        ];
    }

    public function filters(): array
    {
        return [
            //
        ];
    }

    public function actions(\App\Models\Manifest $row): array
    {
        return [
        ];
    }
}
