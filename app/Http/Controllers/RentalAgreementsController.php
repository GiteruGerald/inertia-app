<?php

namespace App\Http\Controllers;

use App\Http\Requests\AgreementRequest;
use App\Models\RentalAgreement;
use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class RentalAgreementsController extends Controller
{



    public function create(Tenant $tenant)
    {
        return Inertia::render('Agreements/Create',[
            'tenant'=> $tenant
        ]);


    }


    public function store(AgreementRequest $request)
    {
         RentalAgreement::create($request->validated());

         return Redirect::route('units.index');
        
    
    }


    public function show(RentalAgreement $rentalAgreement)
    {
        //
    }

    public function edit(RentalAgreement $rentalAgreement)
    {
        //
    }


    public function update(AgreementRequest $request, RentalAgreement $rentalAgreement)
    {
        //
    }

    public function destroy(RentalAgreement $rentalAgreement)
    {
        //
    }
}
