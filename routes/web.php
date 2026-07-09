<?php

use App\Http\Controllers\SectorController;
use App\Http\Controllers\SpecialtyController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\CareUnitController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {

    Route::resource('setores', SectorController::class)
        ->middleware('permission:modulo.setores');

    Route::resource('especialidades', SpecialtyController::class)
        ->middleware('permission:modulo.especialidades');

    Route::resource('equipamentos', EquipmentController::class)
        ->middleware('permission:modulo.equipamentos');

    Route::resource('unidades', CareUnitController::class)
        ->middleware('permission:modulo.unidades');

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::resource('users', UserController::class)
        ->middleware('role:Administrador');

    Route::resource('permissions', PermissionController::class)
        ->middleware('role:Administrador');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';
