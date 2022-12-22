<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Inertia\Inertia;

class PropertyController extends Controller
{
    public function index()
    {
        return Inertia::render('Properties/Index',[
            'properties'=> Property::all()
        ]);
    }
    
    
    public function create()
    {
        return Inertia::render('Properties/Create');
    }

    public function store(Request $request) 
    {
        $image = Request::file('image')->store('properties', 'public');
        Property::create([
            'name' =>$request->input('name'),
            'location' =>$request->input('location'),
            'image' => $image
        ]);


        return Inertia::render('Properties/Index',[
            'properties'=> Property::all()
        ]);
    }


}
