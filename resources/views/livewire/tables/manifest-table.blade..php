<div class="card">
    <div class="card-header">
        <div>
            <h3 class="card-title">
                {{ __('Manifests') }}
            </h3>
        </div>

        <div class="card-actions">
            <x-action.create route="{{ route('manifests.create') }}" />
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
                    <input type="text" wire:model.live="search" class="form-control form-control-sm" aria-label="Search manifest">
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
                    <a wire:click.prevent="sortBy('manifest_number')" href="#" role="button">
                        {{ __('Manifest Number') }}
                        @include('inclues._sort-icon', ['field' => 'manifest_number'])
                    </a>
                </th>
                <th scope="col" class="align-middle text-center">
                    <a wire:click.prevent="sortBy('manifest_date')" href="#" role="button">
                        {{ __('Manifest Date') }}
                        @include('inclues._sort-icon', ['field' => 'manifest_date'])
                    </a>
                </th>
                <th scope="col" class="align-middle text-center">
                    <a wire:click.prevent="sortBy('shipment_id')" href="#" role="button">
                        {{ __('Shipment Id') }}
                        @include('inclues._sort-icon', ['field' => 'shipment_id'])
                    </a>
                </th>
                <th scope="col" class="align-middle text-center">
                    {{ __('Action') }}
                </th>
            </tr>
            </thead>
            <tbody>
            @forelse ($manifests as $manifest)
                <tr>
                    <td class="align-middle text-center">
                        {{ $manifest->id }}
                    </td>
                    <td class="align-middle text-center">
                        {{ $manifest->manifest_number }}
                    </td>
                    <td class="align-middle text-center">
                        {{ $manifest->manifest_date }}
                    </td>
                    <td class="align-middle text-center">
                        {{ $manifest->shipment_id }}
                    </td>
                    <td class="align-middle text-center">
                        <x-button.show class="btn-icon" route="{{ route('manifests.show', $manifest) }}"/>
                        <x-button.edit class="btn-icon" route="{{ route('manifests.edit', $manifest) }}"/>
                        <x-button.delete class="btn-icon" route="{{ route('manifests.destroy', $manifest) }}"/>
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
            Showing <span>{{ $manifests->firstItem() }}</span> to <span>{{ $manifests->lastItem() }}</span> of <span>{{ $manifests->total() }}</span> entries
        </p>

        <ul class="pagination m-0 ms-auto">
            {{ $manifests->links() }}
        </ul>
    </div>
</div>
