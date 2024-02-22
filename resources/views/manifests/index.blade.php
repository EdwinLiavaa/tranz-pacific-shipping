@extends('layouts.tabler')

@section('content')
<div class="page-body">
    @if($manifests->isEmpty())
        <x-empty
            title="No manifests found"
            message="Try adjusting your search or filter to find what you're looking for."
            button_label="{{ __('Add your first Manifest') }}"
            button_route="{{ route('manifests.create') }}"
        />
    @else
        <div class="container-xl">

            {{---
            <div class="card">
                <div class="card-body">
                    <livewire:power-grid.manifests-table/>
                </div>
            </div>
            ---}}

            @livewire('tables.manifest-table')
        </div>
    @endif
</div>
@endsection
