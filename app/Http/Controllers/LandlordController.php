<?php

namespace App\Http\Controllers;

use App\Models\Landlord;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class LandlordController extends Controller
{

    public function index()
    {
        return Inertia::render('Landlords/Index', [
            'landlords' => Landlord::all()->map(function ($landlord) {
                return [
                    'id' => $landlord->id,
                    'name' => $landlord->name,
                ];
            })
        ]);
    }


    public function create()
    {
        return Inertia::render('Landlords/Create',
        [
            'locations'=>Location::all()
        ]
    );
    }

    public function store(Request $request)
    {
        Landlord::create([
            'name' => $request->input('name'),
            'location_id' =>$request->input('location'),
            
        ]);

        return Redirect::route('landlords.index');
    }

    public function show($id)
    {
        //
    }


    public function edit(Landlord $landlord)
    {
        return Inertia::render('Landlords/Edit',
        [
            'landlord'=>$landlord,
            'locations'=> Location::all()

        ]);
    }

    public function update(Request $request, Landlord $landlord)
    {
        $landlord->update([
            'name'=>$request->input('name'),
            'location_id' =>$request->input('location'),

        ]);
        return Redirect::route('landlords.index');

    }

    public function destroy(Landlord $landlord)
    {
        $landlord->delete();
        
        return Redirect::route('landlords.index');
    }
}
