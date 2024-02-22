@extends('layouts.tabler')

@section('content')
<div class="page-body">
    @if($containers->isEmpty())
        <x-empty
            title="No containers found"
            message="Try adjusting your search or filter to find what you're looking for."
            button_label="{{ __('Add your first Container') }}"
            button_route="{{ route('containers.create') }}"
        />
    @else
        <div class="container-xl">

            {{---
            <div class="card">
                <div class="card-body">
                    <livewire:power-grid.containers-table/>
                </div>
            </div>
            ---}}

            @livewire('tables.container-table')
        </div>
    @endif
</div>
@endsection
