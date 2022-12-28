<?php

namespace App\Http\Controllers;

use App\Http\Requests\LocationRequest;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Inertia\Inertia;

class LocationController extends Controller
{
    public function index()
    {
        return Inertia::render('Locations/Index', [
            'locations' => Location::all()->map(function ($location) {
                return [
                    'id' => $location->id,
                    'name' => $location->name,
                ];
            })
        ]);
    }
    public function create()
    {
        return Inertia::render('Locations/Create');
    }

    public function store(LocationRequest $request)
    {

        Location::create($request->validated());
        return Redirect::route('locations.index');
    }


    public function edit(Location $location)
    {

        return Inertia::render(
            'Locations/Edit',
            [
                'location' => $location
            ]
        );
    }


    public function update(LocationRequest $request, Location $location)
    {
        $location->update($request->validated());
        return Redirect::route('locations.index');
    }

    public function destroy( Location $location)
    {
        $location->delete();
        
        return Redirect::route('locations.index');
    }
}
