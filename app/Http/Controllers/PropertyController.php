<?php

namespace App\Http\Controllers;

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
            'properties' => Property::with('location','manager')->get()
            // 'properties'=> Property::all()->map(function($property){
            // 'properties'=> Property::all()       
        ]);
    }
    
    
    public function create()
    {
        return Inertia::render('Properties/Create',[
            'locations'=> Location::all(),
            'managers'=>PropertyManager::all()
        ]);
    }

    public function store(Request $request) 
    {
        if(FacadesRequest::file('image')){
        $image = FacadesRequest::file('image')->store('properties', 'public');
        }
        Property::create([
            'name' => $request->input('name'),
            'location_id' =>$request->input('location'),
            'manager_id' =>$request->input('manager'),
            // 'image' => $image
        ]);


        return Redirect::route('properties.index'); 

    }


    public function edit(Property $property)
    {

        return Inertia::render(
            'Properties/Edit',
            [
                'property' => $property,
                // 'image' => asset('/storage/'. $property->image)
                'locations'=> Location::all(),
                'managers'=> PropertyManager::all()

            ]
        );
    }


    public function update(Property $property)
    {
        $image = $property->image;

        if(FacadesRequest::file('image')){
            Storage::delete('public/'. $property->image);
            $image = FacadesRequest::file('image')->store('properties', 'public');
        }

        $property->update([
            'name'=> FacadesRequest::input('name'),
            'location_id'=> FacadesRequest::input('location'),
            'manager_id' => FacadesRequest::input('manager'),

            // 'image'=> $image
        ]);
        
        return Redirect::route('properties.index'); 

    }

    public function delete(Property $property)
    {
        Storage::delete('public/'. $property->image);
        $property->delete();
        return Redirect::route('properties.index'); 

    }
}
