<?php

namespace App\Http\Controllers;

use App\Models\Landlord;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class LandlordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Landlords/Create',
        [
            'locations'=>Location::all()
        ]
    );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Landlord::create([
            'name' => $request->input('name'),
            'location_id' =>$request->input('location'),
            
        ]);

        return Redirect::route('landlords.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Landlord $landlord)
    {
        return Inertia::render('Landlords/Edit',
        [
            'landlord'=>$landlord,
            'locations'=> Location::all()

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Landlord $landlord)
    {
        $landlord->update([
            'name'=>$request->input('name'),
            'location_id' =>$request->input('location'),

        ]);
        return Redirect::route('landlords.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Landlord $landlord)
    {
        $landlord->delete();
        
        return Redirect::route('landlords.index');
    }
}
