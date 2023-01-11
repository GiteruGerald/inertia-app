<?php

namespace App\Http\Controllers;

use App\Http\Requests\PropertyManagerRequest;
use App\Models\Location;
use App\Models\PropertyManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class PropertyManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {         
        return Inertia::render('PropertyManagers/Index', [
            'managers' => PropertyManager::with('location')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('PropertyManagers/Create',
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
    public function store(PropertyManagerRequest $request)
    {
        PropertyManager::create($request->validated());

        return Redirect::route('managers.index');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
    * @return \Illuminate\Http\Response
     */
    public function edit(PropertyManager $manager)
    {
        // return response()->json($manager->location()->get());
        return Inertia::render('PropertyManagers/Edit',
        [
            'manager'=>$manager,
            'locations'=> Location::all(),
            'location'=>$manager->location()->get(),

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PropertyManagerRequest $request, PropertyManager $manager)
    {
        $manager->update($request->validated());

        return Redirect::route('managers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PropertyManager $manager)
    {
        $manager->delete();

        return Redirect::route('managers.index');

    }
}
