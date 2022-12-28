<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Tenant;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {

        // $totalProperties = DB::table('properties')->count();;
        $totalProperties = Property::all()->count();
        $totalUnits = Unit::all()->count();
        $totalTenants = Tenant::all()->count();
        $latestProperty = Property::query()->with('location')->latest('created_at')->first();
        $latestTenants = Tenant::query()->latest('created_at')->get();

          
        // return response()->json($latestProperty);
        return Inertia::render('Dashboard', [

            'totalProperties' => $totalProperties,
            'totalUnits' => $totalUnits,
            'totalTenants' => $totalTenants,
            'latestProperty'=> $latestProperty,
            'latestTenants'=>$latestTenants
        ]);
    }
}
