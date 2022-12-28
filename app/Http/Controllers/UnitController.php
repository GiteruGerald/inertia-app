<?php

namespace App\Http\Controllers;

use App\Http\Requests\UnitRequest;
use App\Models\Property;
use App\Models\Tenant;
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
            'properties'=> Property::all(),
        ]);
    }

    public function store(UnitRequest $request)
    {
        Unit::create($request->validated());

        return Redirect::route('units.index');
    }

    public function show(Unit $unit)
    {
        $tenant = Tenant::where('unit_id', $unit->id)->first();
        // return response()->json($tenant); 
        return Inertia::render('Units/Show',
        [
            'unit'=>$unit,
            'property'=>$unit->property()->first(),
            'tenant'=> $tenant
        ]);
    }

    public function edit(Unit $unit)
    {
        return Inertia::render('Units/Edit',
        [
          'unit'=> $unit,
          'properties' => Property::all()
        ]);
    }


    public function update(UnitRequest $request, Unit $unit)
    {
        $unit->update($request->validated());

        return Redirect::route('units.index');
    }

    public function destroy(Unit $unit)
    {
        $unit->delete();

        return Redirect::route('units.index');
    }
}
