<div class="card">
    <div class="card-header">
        <div>
            <h3 class="card-title">
                {{ __('Shipments') }}
            </h3>
        </div>

        <div class="card-actions">
            <x-action.create route="{{ route('shipments.create') }}" />
        </div>
    </div>

    <div class="card-body border-bottom py-3">
        <div class="d-flex">
            <div class="text-secondary">
                Show
                <div class="mx-2 d-inline-block">
                    <select wire:model.live="perPage" class="form-select form-select-sm" aria-label="result per page">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                        <option value="25">25</option>
                    </select>
                </div>
                entries
            </div>
            <div class="ms-auto text-secondary">
                Search:
                <div class="ms-2 d-inline-block">
                    <input type="text" wire:model.live="search" class="form-control form-control-sm" aria-label="Search shipment">
                </div>
            </div>
        </div>
    </div>

    <x-spinner.loading-spinner/>

    <div class="table-responsive">
        <table wire:loading.remove class="table table-bordered card-table table-vcenter text-nowrap datatable">
            <thead class="thead-light">
            <tr>
                <th scope="col" class="align-middle text-center">
                    <a wire:click.prevent="sortBy('id')" href="#" role="button">
                        {{ __('Id') }}
                        @include('inclues._sort-icon', ['field' => 'id'])
                    </a>
                </th>
                <th scope="col" class="align-middle text-center">
                    <a wire:click.prevent="sortBy('hbl_number')" href="#" role="button">
                        {{ __('HBL No.') }}
                        @include('inclues._sort-icon', ['field' => 'hbl_number'])
                    </a>
                </th>
                <th scope="col" class="align-middle text-center">
                    <a wire:click.prevent="sortBy('consignor')" href="#" role="button">
                        {{ __('Consignor') }}
                        @include('inclues._sort-icon', ['field' => 'consignor'])
                    </a>
                </th>
                <th scope="col" class="align-middle text-center">
                    <a wire:click.prevent="sortBy('consignee')" href="#" role="button">
                        {{ __('Consignee') }}
                        @include('inclues._sort-icon', ['field' => 'consignee'])
                    </a>
                </th>
                <th scope="col" class="align-middle text-center">
                    <a wire:click.prevent="sortBy('weight')" href="#" role="button">
                        {{ __('Weight') }}
                        @include('inclues._sort-icon', ['field' => 'weight'])
                    </a>
                </th>
                <th scope="col" class="align-middle text-center">
                    <a wire:click.prevent="sortBy('volume')" href="#" role="button">
                        {{ __('Volume') }}
                        @include('inclues._sort-icon', ['field' => 'volume'])
                    </a>
                </th>
                <th scope="col" class="align-middle text-center">
                    <a wire:click.prevent="sortBy('packages')" href="#" role="button">
                        {{ __('Packages') }}
                        @include('inclues._sort-icon', ['field' => 'packages'])
                    </a>
                </th>
                <th scope="col" class="align-middle text-center">
                    <a wire:click.prevent="sortBy('handling_instructions')" href="#" role="button">
                        {{ __('Handling Instructions') }}
                        @include('inclues._sort-icon', ['field' => 'handling_instructions'])
                    </a>
                </th>
                <th scope="col" class="align-middle text-center">
                    <a wire:click.prevent="sortBy('container_id')" href="#" role="button">
                        {{ __('Container Id') }}
                        @include('inclues._sort-icon', ['field' => 'container_id'])
                    </a>
                </th>
                <th scope="col" class="align-middle text-center">
                    {{ __('Action') }}
                </th>
            </tr>
            </thead>
            <tbody>
            @forelse ($shipments as $shipment)
                <tr>
                    <td class="align-middle text-center">
                        {{ $shipment->id }}
                    </td>
                    <td class="align-middle text-center">
                        {{ $shipment->hbl_number }}
                    </td>
                    <td class="align-middle text-center">
                        {{ $shipment->consignor }}
                    </td>
                    <td class="align-middle text-center">
                        {{ $shipment->consignee }}
                    </td>
                    <td class="align-middle text-center">
                        {{ $shipment->weight }}
                    </td>
                    <td class="align-middle text-center">
                        {{ $shipment->volume }}
                    </td>
                    <td class="align-middle text-center">
                        {{ $shipment->packages }}
                    </td>
                    <td class="align-middle text-center">
                        {{ $shipment->handling_instructions }}
                    </td>
                    <td class="align-middle text-center">
                        {{ $shipment->container_id }}
                    </td>
                    <td class="align-middle text-center">
                        <x-button.show class="btn-icon" route="{{ route('shipments.show', $shipment) }}"/>
                        <x-button.edit class="btn-icon" route="{{ route('shipments.edit', $shipment) }}"/>
                        <x-button.delete class="btn-icon" route="{{ route('shipments.destroy', $shipment) }}"/>
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="align-middle text-center" colspan="8">
                        No results found
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

    <div class="card-footer d-flex align-items-center">
        <p class="m-0 text-secondary">
            Showing <span>{{ $shipments->firstItem() }}</span> to <span>{{ $shipments->lastItem() }}</span> of <span>{{ $shipments->total() }}</span> entries
        </p>

        <ul class="pagination m-0 ms-auto">
            {{ $shipments->links() }}
        </ul>
    </div>
</div>
