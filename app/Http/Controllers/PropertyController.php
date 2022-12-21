<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PropertyController extends Controller
{
    public function index()
    {
        return Inertia::render('Properties/Index',[
            'properties'=> Property::all()
        ]);
    }
}
