<?php

namespace App\Http\Controllers;

use App\Models\Manifest;
use App\Http\Requests\Customer\StoreManifestRequest;
use App\Http\Requests\Customer\UpdateManifestRequest;

class ManifestController extends Controller
{
    public function index()
    {
        $manifests = Manifest::all();

        return view('customers.index', [
            'manifests' => $manifests
        ]);
    }

    public function create()
    {
        return view('manifests.create');
    }

    public function store(StoreManifestRequest $request)
    {
        $manifest = Manifest::create($request->all());

        /**
         * Handle upload an image
         */
        if($request->hasFile('photo'))
        {
            $file = $request->file('photo');
            $filename = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();

            $file->storeAs('manifests/', $filename, 'public');
            $customer->update([
                'photo' => $filename
            ]);
        }

        return redirect()
            ->route('manifests.index')
            ->with('success', 'New manifest has been created!');
    }

    public function show(Manifest $manifest)
    {
        $customer->loadMissing(['quotations', 'orders'])->get();

        return view('manifests.show', [
            'manifest' => $manifest
        ]);
    }

    public function edit(Manifest $manifest)
    {
        return view('customers.edit', [
            'manifest' => $manifest
        ]);
    }

    public function update(UpdateManifestRequest $request, Manifest $manifest)
    {
        //
        $customer->update($request->except('photo'));

        if($request->hasFile('photo')){

            // Delete Old Photo
            if($manifest->photo){
                unlink(public_path('storage/manifests/') . $customer->photo);
            }

            // Prepare New Photo
            $file = $request->file('photo');
            $fileName = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();

            // Store an image to Storage
            $file->storeAs('manifests/', $fileName, 'public');

            // Save DB
            $customer->update([
                'photo' => $fileName
            ]);
        }

        return redirect()
            ->route('manifests.index')
            ->with('success', 'Manifest has been updated!');
    }

    public function destroy(Manifest $manifest)
    {
        if($manifest->photo)
        {
            unlink(public_path('storage/manifests/') . $manifest->photo);
        }

        $manifest->delete();

        return redirect()
            ->back()
            ->with('success', 'Manifest has been deleted!');
    }
}
