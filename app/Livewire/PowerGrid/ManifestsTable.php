<?php

namespace App\Livewire\PowerGrid;

use App\Models\Manifest;
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
use PowerComponents\LivewirePowerGrid\Traits\WithExport;

final class ManifestsTable extends PowerGridComponent
{
    use WithExport;

    public int $perPage = 5;
    public array $perPageValues = [0, 5, 10, 20, 50];

    public function setUp(): array
    {
        return [
            Exportable::make('export')
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),

            Header::make()->showSearchInput(),

            Footer::make()
                ->showPerPage($this->perPage, $this->perPageValues)
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        return Manifest::query();
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function addColumns(): PowerGridColumns
    {
        return PowerGrid::columns()
            ->addColumn('id')
            ->addColumn('manifest_number')
            ->addColumn('manifest_date')
            ->addColumn('shipment_id')
            ->addColumn('shipment_number', function (Manifest $manifest){
                return $manifest->shipment_number->hbl_number;
            })
            ->addColumn('created_at_formatted', fn (Manifest $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'));
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id')
                ->headerAttribute('text-left')
                ->bodyAttribute('text-left'),
            Column::make('Manifest Number', 'manifest_number')
                ->headerAttribute('text-left')
                ->bodyAttribute('text-left')
                ->sortable()
                ->searchable(),
            Column::make('Manifest Date', 'manifest_date')
                ->headerAttribute('text-left')
                ->bodyAttribute('text-left')
                ->sortable()
                ->searchable(),
            Column::action('Action')
                ->headerAttribute('align-middle text-center', styleAttr: 'width: 150px;')
                ->bodyAttribute('align-middle text-center d-flex justify-content-around')
        ];
    }

    public function filters(): array
    {
        return [

        ];
    }

    public function actions(\App\Models\Manifest $row): array
    {
        return [
            Button::make('show', file_get_contents('assets/svg/eye.svg'))
                ->class('btn btn-outline-info btn-icon w-100')
                ->tooltip('Show Manifest Details')
                ->route('manifests.show', ['manifest' => $row])
                ->method('get'),

            Button::make('edit', file_get_contents('assets/svg/edit.svg'))
                ->class('btn btn-outline-warning btn-icon w-100')
                ->route('manifests.edit', ['manifest' => $row])
                ->method('get')
                ->tooltip('Edit Manifest'),

            Button::add('delete')
                ->slot(file_get_contents('assets/svg/trash.svg'))
                ->class('btn btn-outline-danger btn-icon w-100')
                ->tooltip('Delete Manifest')
                ->route('manifests.destroy', ['manifest' => $row])
                ->method('delete'),
        ];
    }
}
