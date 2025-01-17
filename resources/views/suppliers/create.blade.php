@extends('layouts.tabler')

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center mb-3">
            <div class="col">
                <h2 class="page-title">
                    {{ __('Create Agent') }}
                </h2>
            </div>
        </div>

        @include('partials._breadcrumbs')
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">

            <form action="{{ route('suppliers.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">
                                    {{ __('Agent Details') }}
                                </h3>

                                <div class="row row-cards">
                                    <div class="col-md-12">
                                        <x-input name="name" :required="true" />

                                        <x-input name="email" label="Email address" :required="true" />

                                        <x-input name="shopname" label="Business name" :required="true" />

                                        <x-input name="phone" label="Phone number" :required="true" />
                                    </div>


                                    <div class="col-sm-6 col-md-6">
                                        <label for="type" class="form-label required">
                                            Type of agent
                                        </label>

                                        <select class="form-select @error('type') is-invalid @enderror" id="type" name="type">
                                            <option selected="" disabled="">Select a type:</option>

                                            @foreach(\App\Enums\SupplierType::cases() as $supplierType)
                                                <option value="{{ $supplierType->value }}" @selected(old('type') == $supplierType->value)>
                                                    {{ $supplierType->label() }}
                                                </option>
                                            @endforeach
                                        </select>

                                        @error('type')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="col-sm-6 col-md-6">
                                        <label for="bank_name" class="form-label required">
                                            Bank Name
                                        </label>

                                        <select class="form-select @error('bank_name') is-invalid @enderror" id="bank_name" name="bank_name">
                                            <option selected="" disabled="">Select a bank:</option>
                                            <option value="ANZ" @if(old('bank_name') == 'ANZ')selected="selected"@endif>ANZ</option>
                                            <option value="BSP" @if(old('bank_name') == 'BSP')selected="selected"@endif>BSP</option>
                                            <option value="MBF" @if(old('bank_name') == 'MBF')selected="selected"@endif>MBF</option>
                                            <option value="TDB" @if(old('bank_name') == 'TSD')selected="selected"@endif>TDB</option>
                                        </select>
                                        @error('bank_name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="col-sm-6 col-md-6">
                                        <x-input name="account_holder" label="Account holder"/>
                                    </div>

                                    <div class="col-sm-6 col-md-6">
                                        <x-input name="account_number" label="Account number"/>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="address" class="form-label">
                                                {{ __('Address') }}
                                            </label>

                                            <textarea id="address"
                                                      name="address"
                                                      rows="3"
                                                      class="form-control @error('address') is-invalid @enderror"
                                            >{{ old('address') }}</textarea>

                                            @error('address')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <button class="btn btn-primary" type="submit">
                                    {{ __('Save') }}
                                </button>

                                <a class="btn btn-outline-warning" href="{{ route('suppliers.index') }}">
                                    {{ __('Cancel') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@pushonce('page-scripts')
<script src="{{ asset('assets/js/img-preview.js') }}"></script>
@endpushonce
