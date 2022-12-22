<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use Inertia\Inertia;

class LocationController extends Controller
{
    public function index()
    {
        return Inertia::render('Locations/Index',[
            'locations'=> Location::all()
        ]);
    }
    public function create()
    {
        return Inertia::render('Locations/Create');
    }

    public function store(Request $request)
    {
        Location::create([
            'name'=> $request->input('name')
        ]);
        return Inertia::render('Locations/Index',[
            'locations'=> Location::all()
        ]);    }

}
