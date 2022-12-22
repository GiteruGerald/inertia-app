<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Inertia\Inertia;

class PropertyController extends Controller
{
    public function index()
    {
        return Inertia::render('Properties/Index',[
            'properties'=> Property::all()->map(function($property){
                return [
                    'id' => $property->id,
                    'name' => $property->name,
                    'image' => asset('storage/'. $property->image)
                ];
            })
        ]);
    }
    
    
    public function create()
    {
        return Inertia::render('Properties/Create');
    }

    public function store(Request $request) 
    {
        $image = FacadesRequest::file('image')->store('properties', 'public');
        Property::create([
            'name' => $request->input('name'),
            'location' =>$request->input('location'),
            'image' => $image
        ]);


        return Redirect::route('properties.index'); 

    }


    public function edit(Property $property)
    {

        return Inertia::render(
            'Properties/Edit',
            [
                'property' => $property
            ]
        );
    }
}
