<?php

use App\Http\Controllers\CovertureSanteController;
use App\Http\Controllers\MedecinController;
use App\Http\Controllers\MedecinViewController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReceptionController;
use App\Http\Controllers\ReceptionViewController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AppointmentController;

Route::get('/medecins-by-service/{service_id}', function ($service_id) {
    return \App\Models\User::where('service_id', '=',$service_id, 'and')
        ->where('role_id','=',3)
        ->select('id', 'nom', 'prenom')
        ->get();
});

Route::get('/', function () {
    if (!auth()->check()) {
        return redirect(route('login'));
    }

    return match(auth()->user()->role_id) {
        1 => redirect()->route('dashboard'),
        2 => redirect()->route('reception.dashboard'),
        3 => redirect()->route('medecin.dashboard'),
        default => redirect(route('login')),
    };
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth',\App\Http\Middleware\AdminMiddleware::class])->group(function () {
    Route::get('/admin', function () {return view('admin.dashboard'); })->name('dashboard');
    Route::get('/admin/users', fn () => view('admin.users.index'))->name('admin.users.index');
    Route::get('/admin/appointments', fn () => view('admin.appointments.index'))->name('admin.appointments.index');

    Route::resource('/admin/receptions', ReceptionController::class);
    Route::resource('/admin/medecins', MedecinController::class);
    Route::resource('/admin/patients', PatientController::class);
    Route::resource('/admin/appointments', AppointmentController::class);
    Route::resource('/admin/services', ServiceController::class);
    Route::resource('/admin/covertures-sante', CovertureSanteController::class);
});

Route::middleware(['auth',\App\Http\Middleware\MedecinMiddleware::class])->group(function () {
    Route::get('/medecin', [MedecinViewController::class, 'index'])->name('medecin.dashboard');
});

Route::middleware(['auth',\App\Http\Middleware\ReceptionMiddleware::class])->group(function () {
    Route::get('/reception', [ReceptionViewController::class, 'index'])->name('reception.dashboard');
    Route::get('/reception/create', [ReceptionViewController::class, 'create'])->name('reception.create');
    Route::post('/reception',[ReceptionViewController::class,'store'])->name('reception-view.store');
});

require __DIR__.'/auth.php';
