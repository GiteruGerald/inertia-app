<?php

namespace App\Http\Controllers;

use App\Http\Requests\PropertyRequest;
use App\Models\Landlord;
use App\Models\Location;
use App\Models\Property;
use App\Models\PropertyManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class PropertyController extends Controller
{
    public function index()
    {
        // $properties = Property::with('location','manager')->get();

        // return response()->json($properties);
        return Inertia::render('Properties/Index',[
            'properties' => Property::with('location','manager','landlord')->get()
            // 'properties'=> Property::all()->map(function($property){
            // 'properties'=> Property::all()       
        ]);
    }
    
    
    public function create()
    {
        return Inertia::render('Properties/Create',[
            'locations'=> Location::all(),
            'managers'=>PropertyManager::all(),
            'landlords'=>Landlord::all()
        ]);
    }

    public function store(PropertyRequest $request) 
    {
        // if(FacadesRequest::file('image')){
        // $image = FacadesRequest::file('image')->store('properties', 'public');
        // }
        Property::create($request->validated());


        return Redirect::route('properties.index'); 

    }


    public function edit(Property $property)
    {
        // $item = $property->location();
        // return response()->json($property->location());

        return Inertia::render(
            'Properties/Edit',
            [

                'property' => $property,
                // 'location' => $property->location(),
                // 'manager' => $property->manager(),
                // 'image' => asset('/storage/'. $property->image)
                'locations'=> Location::all(),
                'managers'=> PropertyManager::all(),
                'landlords'=>Landlord::all()


            ]
        );
    }


    public function update(PropertyRequest $request, Property $property)
    {
        // $image = $property->image;

        // if(FacadesRequest::file('image')){
        //     Storage::delete('public/'. $property->image);
        //     $image = FacadesRequest::file('image')->store('properties', 'public');
        // }

        $property->update($request->validated());
        
        return Redirect::route('properties.index'); 

    }

    public function delete(Property $property)
    {
        Storage::delete('public/'. $property->image);
        $property->delete();
        return Redirect::route('properties.index'); 

    }
}
