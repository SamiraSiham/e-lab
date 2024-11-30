<?php

use Carbon\Carbon;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Salle;
use App\Models\Materiel;
use App\Models\Enseigner;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SalleController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\EtagereController;
use App\Http\Controllers\PlacardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MaterielController;
use App\Http\Controllers\EnseignerController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RevokePermissionController;

Route::get('/', function () {
    return Inertia::render('Landing', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('/');

Route::get('/dashboard', function () {
    $roles = auth()->user()->getRoleNames();
    $user_count = User::count();
    $materiel_count = Materiel::count();
    $salle_count = Salle::count();
    $events = Enseigner::with('users')
    ->with('salles')->with('modules')->get()->map(
        function ($event){
            return [
                'id' => $event->id,
                'professeur' => $event->users->nom,
                'salle' => $event->salles->nom_salle,
                'module' => $event->modules->nom_module,
                'type' => $event->type_cours,
                'date' => $event->date_deroulement,
                'start' => $event->date_deroulement .' '. Carbon::parse($event->heure_debut)->format('H:i'),
                'end' =>$event->date_deroulement .' '. Carbon::parse($event->heure_fin)->format('H:i'),
                'title' => $event->type_cours . $event->salles->nom_salle,
            ];
        }
    );
    return Inertia::render('Dashboard', compact('user_count', 'materiel_count', 'salle_count', 'events', 'roles'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('admin', AdminController::class);
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::delete('/roles/{role}/permissions/{permission}', RevokePermissionController::class)->name('roles.permissions.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('modules', ModuleController::class);
    Route::resource('salles', SalleController::class);
    Route::resource('enseigner', EnseignerController::class);
    Route::resource('placards', PlacardController::class);
    Route::resource('etageres', EtagereController::class);
    Route::resource('materiels', MaterielController::class);
});

require __DIR__.'/auth.php';
