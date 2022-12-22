<?php

namespace App\Http\Controllers;

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

    public function store(Request $request)
    {
        Location::create([
            'name' => $request->input('name')
        ]);
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


    public function update( Location $location)
    {
        $location->update([
            'name' => FacadesRequest::input('name'),
        ]);
        return Redirect::route('locations.index');
    }

    public function delete( Location $location)
    {
        $location->delete();
        
        return Redirect::route('locations.index');
    }
}
