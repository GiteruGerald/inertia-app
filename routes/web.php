<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandlordController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\PropertyManagerController;
use App\Http\Controllers\RentalAgreementsController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\UnitController;
use App\Models\PropertyManager;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/admin-dash', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// Route::get('/properties/', [PropertyController::class, 'index'])->name('properties.index');
// Route::get('/properties/create', [PropertyController::class, 'create'])->name('properties.create');
// Route::get('/properties/{property}/edit', [PropertyController::class, 'edit'])->name('properties.edit');
// Route::put('/properties/{property}', [PropertyController::class, 'update'])->name('properties.update');
// Route::delete('/properties/{property}', [PropertyController::class, 'delete'])->name('properties.delete');
// Route::post('/properties/', [PropertyController::class, 'store'])->name('properties.store');


// Route::get('/locations/', [LocationController::class, 'index'])->name('locations.index');
// Route::get('/locations/create', [LocationController::class, 'create'])->name('locations.create');
// Route::get('/locations/{location}/edit', [LocationController::class, 'edit'])->name('locations.edit');
// Route::put('/locations/{location}', [LocationController::class, 'update'])->name('locations.update');
// Route::delete('/locations/{location}', [LocationController::class, 'delete'])->name('locations.delete');
// Route::post('/locations/', [LocationController::class, 'store'])->name('locations.store');

Route::resource('locations', LocationController::class)->except('show');
Route::resource('properties', PropertyController::class);
Route::resource('managers', PropertyManagerController::class);
Route::resource('landlords', LandlordController::class);
Route::resource('units', UnitController::class);
Route::resource('tenants', TenantController::class);

Route::get('/dashboard/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/agreements/{tenant}/create', [RentalAgreementsController::class, 'create'])->name('agreements.create');
Route::post('/agreements/', [RentalAgreementsController::class, 'store'])->name('agreements.store');




// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
