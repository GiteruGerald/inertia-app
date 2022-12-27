<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class UnitController extends Controller
{

    public function index()
    {
        return Inertia::render('Units/Index',[
            'units'=> Unit::with('property')->get()
        ]);
    }


    public function create()
    {
        return Inertia::render('Units/Create',[
            'properties'=> Property::all()
        ]);
    }

    public function store(Request $request)
    {
        Unit::create([
            'unit_no' => $request->input('unit_no'),
            'type' => $request->input('type'),
            'block' => $request->input('block'),
            'property_id' => $request->input('property_id')
            
        ]);

        return Redirect::route('units.index');
    }

    public function show(Unit $unit)
    {
        //
    }

    public function edit(Unit $unit)
    {
        return Inertia::render('Units/Edit',
        [
          'unit'=> $unit,
          'properties' => Property::all()
        ]);
    }


    public function update(Request $request, Unit $unit)
    {
        $unit->update([
            'unit_no' => $request->input('unit_no'),
            'type' => $request->input('type'),
            'block' => $request->input('block'),
            'property_id' => $request->input('property_id')
        ]);

        return Redirect::route('units.index');
    }

    public function destroy(Unit $unit)
    {
        $unit->delete();

        return Redirect::route('units.index');
    }
}
