<?php

namespace App\Http\Controllers;

use App\Models\Container;
use App\Http\Requests\Container\StoreContainerRequest;
use App\Http\Requests\Container\UpdateContainerRequest;

class ContainerController extends Controller
{
    public function index()
    {
        $containers = Container::all();

        return view('containers.index', [
            'containers' => $containers
        ]);
    }

    public function create()
    {
        return view('containers.create');
    }

    public function store(StoreContainerRequest $request)
    {
        $container = Container::create($request->all());

        /**
         * Handle upload an image
         */
        if($request->hasFile('photo'))
        {
            $file = $request->file('photo');
            $filename = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();

            $file->storeAs('containers/', $filename, 'public');
            $container->update([
                'photo' => $filename
            ]);
        }

        return redirect()
            ->route('containers.index')
            ->with('success', 'New container has been created!');
    }

    public function show(Container $container)
    {
        $container->loadMissing(['quotations', 'orders'])->get();

        return view('containers.show', [
            'container' => $container
        ]);
    }

    public function edit(Container $container)
    {
        return view('containers.edit', [
            'container' => $container
        ]);
    }

    public function update(UpdateContainerRequest $request, Container $container)
    {
        //
        $container->update($request->except('photo'));

        if($request->hasFile('photo')){

            // Delete Old Photo
            if($container->photo){
                unlink(public_path('storage/containers/') . $container->photo);
            }

            // Prepare New Photo
            $file = $request->file('photo');
            $fileName = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();

            // Store an image to Storage
            $file->storeAs('containers/', $fileName, 'public');

            // Save DB
            $container->update([
                'photo' => $fileName
            ]);
        }

        return redirect()
            ->route('containers.index')
            ->with('success', 'Container has been updated!');
    }

    public function destroy(Container $container)
    {
        if($container->photo)
        {
            unlink(public_path('storage/containers/') . $container->photo);
        }

        $container->delete();

        return redirect()
            ->back()
            ->with('success', 'Container has been deleted!');
    }
}
