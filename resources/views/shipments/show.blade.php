@extends('layouts.tabler')

@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center mb-3">
                <div class="col">
                    <h2 class="page-title">
                        {{ $shipment->shipment_number}}
                    </h2>
                </div>
            </div>

            @include('partials._breadcrumbs', ['model' => $shipment])
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">

                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    {{ __('Shipment Details') }}
                                </h3>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered card-table table-vcenter text-nowrap datatable">
                                    <tbody>
                                    <tr>
                                        <td>HBL Number</td>
                                        <td>{{ $shipment->hbl_number }}</td>
                                    </tr>
                                    <tr>
                                        <td>Consignor</td>
                                        <td>{{ $shipment->consignor }}</td>
                                    </tr>
                                    <tr>
                                        <td>Consignee</td>
                                        <td>{{ $shipment->consignee }}</td>
                                    </tr>
                                    <tr>
                                        <td>Weight</td>
                                        <td>{{ $shipment->weight }}</td>
                                    </tr>
                                    <tr>
                                        <td>Volume</td>
                                        <td>{{ $shipment->volume }}</td>
                                    </tr>
                                    <tr>
                                        <td>Handling Instructions</td>
                                        <td>{{ $shipment->handling_instructions }}</td>
                                    </tr>
                                </table>
                            </div>

                            <div class="card-footer text-end">
                                <a class="btn btn-info" href="{{ route('shipments.index') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-left" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l14 0" /><path d="M5 12l6 6" /><path d="M5 12l6 -6" /></svg>
                                    {{ __('Back') }}
                                </a>

                                <a class="btn btn-warning" href="{{ route('shipments.edit', $shipment) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" /><path d="M13.5 6.5l4 4" /></svg>
                                    {{ __('Edit') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
