<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use App\Http\Requests\Shipment\StoreShipmentRequest;
use App\Http\Requests\Shipment\UpdateShipmentRequest;

class ShipmentController extends Controller
{
    public function index()
    {
        $shipments = Shipment::all();

        return view('shipments.index', [
            'shipments' => $shipments
        ]);
    }

    public function create()
    {
        return view('shipments.create');
    }

    public function store(StoreShipmentRequest $request)
    {
        $shipment = Shipment::create($request->all());

        /**
         * Handle upload an image
         */
        if($request->hasFile('photo'))
        {
            $file = $request->file('photo');
            $filename = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();

            $file->storeAs('shipments/', $filename, 'public');
            $shipment->update([
                'photo' => $filename
            ]);
        }

        return redirect()
            ->route('shipments.index')
            ->with('success', 'New shipment has been created!');
    }

    public function show(Shipment $shipment)
    {
        $shipment->loadMissing(['quotations', 'orders'])->get();

        return view('shipments.show', [
            'shipment' => $shipment
        ]);
    }

    public function edit(Shipment $shipment)
    {
        return view('shipments.edit', [
            'shipment' => $shipment
        ]);
    }

    public function update(UpdateShipmentRequest $request, Shipment $shipment)
    {
        //
        $shipment->update($request->except('photo'));

        if($request->hasFile('photo')){

            // Delete Old Photo
            if($shipment->photo){
                unlink(public_path('storage/shipments/') . $shipment->photo);
            }

            // Prepare New Photo
            $file = $request->file('photo');
            $fileName = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();

            // Store an image to Storage
            $file->storeAs('shipments/', $fileName, 'public');

            // Save DB
            $shipment->update([
                'photo' => $fileName
            ]);
        }

        return redirect()
            ->route('shipments.index')
            ->with('success', 'Shipment has been updated!');
    }

    public function destroy(Shipment $shipment)
    {
        if($shipment->photo)
        {
            unlink(public_path('storage/shipments/') . $shipment->photo);
        }

        $shipment->delete();

        return redirect()
            ->back()
            ->with('success', 'Shipment has been deleted!');
    }
}
