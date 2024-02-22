@extends('layouts.tabler')

@section('content')
<div class="page-body">
    @if($shipments->isEmpty())
        <x-empty
            title="No shipments found"
            message="Try adjusting your search or filter to find what you're looking for."
            button_label="{{ __('Add your first Shipment') }}"
            button_route="{{ route('shipments.create') }}"
        />
    @else
        <div class="container-xl">

            {{---
            <div class="card">
                <div class="card-body">
                    <livewire:power-grid.shipments-table/>
                </div>
            </div>
            ---}}

            @livewire('tables.shipment-table')
        </div>
    @endif
</div>
@endsection
