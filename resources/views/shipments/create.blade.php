@extends('layouts.tabler')

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center mb-3">
            <div class="col">
                <h2 class="page-title">
                    {{ __('Create Shipment') }}
                </h2>
            </div>
        </div>

        @include('partials._breadcrumbs')
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">

            <form action="{{ route('shipments.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">
                                    {{ __('Shipment Details') }}
                                </h3>

                                <div class="row row-cards">
                                    <div class="col-md-12">
                                        <x-input name="hbl_number" label="HBL Number" :required="true"/>
                                    </div>

                                    <div class="col-sm-6 col-md-6">
                                        <x-input label="Consignor" name="consignor" :required="true"/>
                                    </div>

                                    <div class="col-sm-6 col-md-6">
                                        <x-input label="Consignee" name="consignee" :required="true"/>
                                    </div>

                                    <div class="col-sm-6 col-md-6">
                                        <x-input label="Weight" name="weight" :required="true"/>
                                    </div>

                                    <div class="col-sm-6 col-md-6">
                                        <x-input label="Volume" name="volume" :required="true"/>
                                    </div>

                                    <div class="col-sm-12 col-md-12">
                                            <textarea name="handling_instructions"
                                                      id="handling_instructions"
                                                      rows="5"
                                                      class="form-control @error('notes') is-invalid @enderror"
                                                      placeholder="Handling Instructions"
                                            ></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <button class="btn btn-primary" type="submit">
                                    {{ __('Save') }}
                                </button>

                                <a class="btn btn-outline-warning" href="{{ route('shipments.index') }}">
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
