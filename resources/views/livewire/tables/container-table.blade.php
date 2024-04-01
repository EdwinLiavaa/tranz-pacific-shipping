<div class="card">
    <div class="card-header">
        <div>
            <h3 class="card-title">
                {{ __('Containers') }}
            </h3>
        </div>

        <div class="card-actions">
            <x-action.create route="{{ route('containers.create') }}" />
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
                    <input type="text" wire:model.live="search" class="form-control form-control-sm" aria-label="Search container">
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
                    <a wire:click.prevent="sortBy('container_number')" href="#" role="button">
                        {{ __('Container No.') }}
                        @include('inclues._sort-icon', ['field' => 'container_number'])
                    </a>
                </th>
                <th scope="col" class="align-middle text-center">
                    <a wire:click.prevent="sortBy('container_type')" href="#" role="button">
                        {{ __('Container Type') }}
                        @include('inclues._sort-icon', ['field' => 'container_type'])
                    </a>
                </th>
                <th scope="col" class="align-middle text-center">
                    <a wire:click.prevent="sortBy('seal_number')" href="#" role="button">
                        {{ __('Seal No.') }}
                        @include('inclues._sort-icon', ['field' => 'seal_number'])
                    </a>
                </th>
                <th scope="col" class="align-middle text-center">
                    <a wire:click.prevent="sortBy('tare_weight')" href="#" role="button">
                        {{ __('Tare Weight') }}
                        @include('inclues._sort-icon', ['field' => 'tare_weight'])
                    </a>
                </th>
                <th scope="col" class="align-middle text-center">
                    <a wire:click.prevent="sortBy('gross_weight')" href="#" role="button">
                        {{ __('Gross Weight') }}
                        @include('inclues._sort-icon', ['field' => 'gross_weight'])
                    </a>
                </th>
                <th scope="col" class="align-middle text-center">
                    <a wire:click.prevent="sortBy('volume')" href="#" role="button">
                        {{ __('Volume') }}
                        @include('inclues._sort-icon', ['field' => 'volume'])
                    </a>
                </th>
                <th scope="col" class="align-middle text-center">
                    <a wire:click.prevent="sortBy('customer_id')" href="#" role="button">
                        {{ __('Customer Id') }}
                        @include('inclues._sort-icon', ['field' => 'customer_id'])
                    </a>
                </th>
                <th scope="col" class="align-middle text-center">
                    {{ __('Action') }}
                </th>
            </tr>
            </thead>
            <tbody>
            @forelse ($containers as $container)
                <tr>
                    <td class="align-middle text-center">
                        {{ $container->id }}
                    </td>
                    <td class="align-middle text-center">
                        {{ $container->container_number }}
                    </td>
                    <td class="align-middle text-center">
                        {{ $container->container_type }}
                    </td>
                    <td class="align-middle text-center">
                        {{ $container->seal_number }}
                    </td>
                    <td class="align-middle text-center">
                        {{ $container->tare_weight }}
                    </td>
                    <td class="align-middle text-center">
                        {{ $container->gross_weight }}
                    </td>
                    <td class="align-middle text-center">
                        {{ $container->volume }}
                    </td>
                    <td class="align-middle text-center">
                        {{ $container->customer_id }}
                    </td>
                    <td class="align-middle text-center">
                        <x-button.show class="btn-icon" route="{{ route('containers.show', $container) }}"/>
                        <x-button.edit class="btn-icon" route="{{ route('containers.edit', $container) }}"/>
                        <x-button.delete class="btn-icon" route="{{ route('containers.destroy', $container) }}"/>
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
            Showing <span>{{ $containers->firstItem() }}</span> to <span>{{ $containers->lastItem() }}</span> of <span>{{ $containers->total() }}</span> entries
        </p>

        <ul class="pagination m-0 ms-auto">
            {{ $containers->links() }}
        </ul>
    </div>
</div>
