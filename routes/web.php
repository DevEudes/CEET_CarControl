<?php

use App\Http\Controllers\AchatController;
use App\Http\Controllers\AffectationController;
use App\Http\Controllers\ApprovisionnementController;
use App\Http\Controllers\AssuranceController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\MagasinController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\PieceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SortieController;
use App\Http\Controllers\TvmController;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\VehiculeController;
use App\Http\Controllers\VisiteTechniqueController;
use Illuminate\Support\Facades\Gate;

use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    if (Gate::allows('access-dashboard')) {
        return view('dashboard');
    };
    return redirect()->route('vehicules.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
Route::redirect('/', 'login');

Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

// Routes pour les véhicules avec permissions
Route::middleware(['auth', 'can:view-vehicles'])->group(function () {
    Route::get('home', [VehiculeController::class, 'index'])->name('vehicules.index');
    Route::get('vehicule', [VehiculeController::class, 'list'])->name('vehicules.list');
});

Route::middleware(['auth', 'can:manage-vehicles'])->group(function () {
    Route::get('vehicules/create', [VehiculeController::class, 'create'])->name('vehicules.create');
    Route::post('vehicules/store', [VehiculeController::class, 'store'])->name('vehicules.store');
    Route::get('/vehicules/check-unique', [VehiculeController::class, 'checkUnique'])->name('vehicules.checkUnique');
});

// Routes pour les sorties avec permissions
Route::middleware(['auth', 'can:view-sorties'])->group(function () {
    Route::resource('sorties', SortieController::class);
});

// Routes pour les approvisionnements avec permissions
Route::middleware(['auth', 'can:view-approvisionnements'])->group(function () {
    Route::resource('approvisionnements', ApprovisionnementController::class);
});

// Routes pour les affectations avec permissions
Route::middleware(['auth', 'can:view-affectations'])->group(function () {
    Route::resource('affectations', AffectationController::class);
    Route::get('/vehicules/get-immatriculations', [AffectationController::class, 'getImmatriculations'])->name('vehicules.get-immatriculations');
    Route::get('/vehicules/get-info/{immatriculation}', [AffectationController::class, 'getVehicleInfo']);
});



// Routes pour les achats avec permissions
Route::middleware(['auth', 'can:view-achats'])->group(function () {
    Route::resource('achats', AchatController::class);
});

// Routes pour les magasins avec permissions
Route::middleware(['auth', 'can:view-magasins'])->group(function () {
    Route::resource('magasins', MagasinController::class);
});

// Routes pour les maintenances avec permissions
Route::middleware(['auth', 'can:view-maintenances'])->group(function () {
    Route::resource('maintenances', MaintenanceController::class);
});

// Routes pour les pièces avec permissions
Route::middleware(['auth', 'can:view-pieces'])->group(function () {
    Route::resource('pieces', PieceController::class);
});

// Routes pour les pièces avec permissions
Route::middleware(['auth', 'can:view-documents'])->group(function () {
    // Routes pour les TVM avec permissions
    Route::middleware(['auth', 'can:view-tvms'])->group(function () {
        Route::resource('tvms', TvmController::class);
    });

    // Routes pour les visites techniques avec permissions
    Route::middleware(['auth', 'can:view-visite-techniques'])->group(function () {
        Route::resource('visiteTechniques', VisiteTechniqueController::class);
    });

    // Routes pour les assurances avec permissions
    Route::middleware(['auth', 'can:view-assurances'])->group(function () {
        Route::resource('assurances', AssuranceController::class);
    });
});


// Routes pour les utilisateurs avec les permissions
Route::resource('utilisateurs', UtilisateurController::class);
