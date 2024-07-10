<?php

use App\Http\Controllers\AchatController;
use App\Http\Controllers\AffectationController;
use App\Http\Controllers\ApprovisionnementController;
use App\Http\Controllers\AssuranceController;
use App\Http\Controllers\MagasinController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\PieceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SortieController;
use App\Http\Controllers\TvmController;
use App\Http\Controllers\VehiculeController;
use App\Http\Controllers\VisiteTechniqueController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('index');
})->name('home');

Route::resource('vehicules', VehiculeController::class);
Route::resource('sorties', SortieController::class);
Route::resource('approvisionnements', ApprovisionnementController::class);
Route::resource('affectations', AffectationController::class);
Route::resource('achats', AchatController::class);
Route::resource('magasins', MagasinController::class);
Route::resource('maintenances', MaintenanceController::class);
Route::resource('pieces', PieceController::class);
Route::resource('tvms', TvmController::class);
Route::resource('visiteTechniques', VisiteTechniqueController::class);
Route::resource('assurances', AssuranceController::class);