@extends('layouts.tabler')

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center mb-3">
            <div class="col">
                <h2 class="page-title">
                    {{ __('Edit Customer') }}
                </h2>
            </div>
        </div>

        @include('partials._breadcrumbs', ['model' => $container])
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">

            <form action="{{ route('containers.update', $container) }}" method="POST" enctype="multipart/form-data">
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

                                <img class="img-account-profile mb-2" src="{{ $container->photo ? asset('storage/containers/'.$container->photo) : asset('assets/img/demo/user-placeholder.svg') }}" alt="" id="image-preview" />

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
                                    {{ __('Container Details') }}
                                </h3>

                                <div class="row row-cards">
                                    <div class="col-md-12">
                                        <x-input name="container_number" :value="old('container_number', $container->container_number)" :required="true" />

                                        <x-input label="Container Type" name="container_type" :value="old('container_type', $container->container_type)" :required="true" />
                                    </div>

                                    <div class="col-sm-6 col-md-6">
                                        <x-input label="Seal Number" name="seal_number" :value="old('seal_number', $container->seal_number)" :required="true" />
                                    </div>

                                   <div class="col-sm-6 col-md-6">
                                        <x-input label="Tare weight"
                                                 name="tare_weight"
                                                 :value="old('tare_weight', $container->tare_weight)"
                                                 :required="true"
                                        />
                                    </div>

                                    <div class="col-sm-6 col-md-6">
                                        <x-input label="Gross Weight"
                                                 name="gross_weight"
                                                 :value="old('gross_weight', $container->gross_weight)"
                                                 :required="true"
                                        />
                                    </div>

                                    <div class="col-sm-6 col-md-6">
                                        <x-input label="Volume"
                                                 name="volume"
                                                 :value="old('volume', $container->volume)"
                                                 :required="true"
                                        />
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <button class="btn btn-primary" type="submit">
                                    {{ __('Update') }}
                                </button>

                                <a class="btn btn-outline-warning" href="{{ route('containers.index') }}">
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
