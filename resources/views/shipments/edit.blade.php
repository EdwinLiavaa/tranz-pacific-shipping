@extends('layouts.tabler')

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center mb-3">
            <div class="col">
                <h2 class="page-title">
                    {{ __('Edit Shipment') }}
                </h2>
            </div>
        </div>

        @include('partials._breadcrumbs', ['model' => $shipment])
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">

            <form action="{{ route('shipments.update', $shipment) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row">
                    {{--
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">
                                    {{ __('Profile Image') }}
                                </h3>

                                <img class="img-account-profile mb-2" src="{{ $shipment->photo ? asset('storage/shipments/'.$shipment->photo) : asset('assets/img/demo/user-placeholder.svg') }}" alt="" id="image-preview" />

                                <div class="small font-italic text-muted mb-2">JPG or PNG no larger than 2 MB</div>

                                <input class="form-control @error('photo') is-invalid @enderror" type="file"  id="image" name="photo" accept="image/*" onchange="previewImage();">

                                @error('photo')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    --}}
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">
                                    {{ __('Shipment Details') }}
                                </h3>

                                <div class="row row-cards">
                                    <div class="col-md-12">
                                        <x-input name="hbl_number" :value="old('hbl_number', $shipment->hbl_number)" :required="true" />
                                    </div>

                                    <div class="col-sm-6 col-md-6">
                                        <x-input label="Consignor" name="consignor" :value="old('consignor', $shipment->consignor)" :required="true" />
                                    </div>

                                    <div class="col-sm-6 col-md-6">
                                        <x-input label="Consignee" name="consignee" :value="old('consignee', $shipment->consignee)" :required="true" />
                                    </div>

                                   <div class="col-sm-6 col-md-6">
                                        <x-input label="Weight"
                                                 name="weight"
                                                 :value="old('weight', $shipment->weight)"
                                                 :required="true"
                                        />
                                    </div>

                                    <div class="col-sm-6 col-md-6">
                                        <x-input label="Volume"
                                                 name="volume"
                                                 :value="old('volume', $shipment->volume)"
                                                 :required="true"
                                        />
                                    </div>

                                    <div class="col-sm-6 col-md-6">
                                        <x-input label="Packages"
                                                 name="packages"
                                                 :value="old('packages', $shipment->packages)"
                                                 :required="true"
                                        />
                                    </div>

                                    <div class="col-sm-6 col-md-6">
                                        <x-input label="Handling Instructions"
                                                 name="handling_instructions"
                                                 :value="old('handling_instructions', $shipment->handling_instructions)"
                                                 :required="false"
                                        />
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <button class="btn btn-primary" type="submit">
                                    {{ __('Update') }}
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
