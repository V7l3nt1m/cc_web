<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GetController;
use App\Http\Controllers\UpdateController;
use App\Models\User;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [GetController::class, 'index']);

Route::get('/admin', [GetController::class, 'admin_dashboard'])->middleware('auth');
Route::get('/admin/perfil', [GetController::class, 'perfil_admin'])->middleware('auth');
Route::get('/admin/usuarios', [GetController::class, 'gestaoUsuariosAdmin'])->middleware('auth');
Route::put('/admin/perfil/actualizar', [UpdateController::class, 'updateAdminPerfil'])->middleware('auth');







Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        $user = auth()->user();

        if($user->permissao == "admin"){
            return redirect('/admin');
        }
    })->name('dashboard');
});
