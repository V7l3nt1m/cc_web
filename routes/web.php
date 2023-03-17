<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GetController;
use App\Http\Controllers\UpdateController;
use App\Http\Controllers\CreateController;
use App\Http\Controllers\DeleteController;
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

Route::get('/admin', [GetController::class, 'admin_dashboard'])->middleware('auth')->middleware('admin');
Route::put('/lock/{id}', [UpdateController::class, 'lock_user'])->middleware('auth')->name('lock');
Route::put('/unlock/{id}', [UpdateController::class, 'unlock_user'])->middleware('auth');

Route::prefix('admin')->middleware('auth')->middleware('admin')->group(function (){
    Route::get('/perfil', [GetController::class, 'perfil_admin'])->middleware('auth');
    Route::get('/usuarios', [GetController::class, 'gestaoUsuariosAdmin'])->middleware('auth');
    Route::get('/logs', [GetController::class, 'gestaoLogs'])->middleware('auth');

    Route::put('/perfil/actualizar', [UpdateController::class, 'updateAdminPerfil'])->middleware('auth');
    Route::post('/usuarios/cadastro', [CreateController::class, 'storeUsers'])->middleware('auth');
    Route::delete('/delete_log/{log_id}', [DeleteController::class, 'destroy_log'])->middleware('auth');
    Route::delete('/delete/{id}', [DeleteController::class, 'destroy_user'])->middleware('auth');
    Route::get('/edit/{id}', [GetController::class, 'edit'])->middleware('auth');

    Route::put('/update/{id}', [UpdateController::class, 'update'])->middleware('auth'); 

});

Route::get('/tesouraria', [GetController::class, 'tesouraria_dashboard'])->middleware('auth')->middleware('tesoureiro');

Route::prefix('tesouraria')->middleware('auth')->middleware('tesoureiro')->group(function (){
    Route::get('/perfil', [GetController::class, 'perfil_tesoura'])->middleware('auth');
    Route::put('/perfil/actualizar', [UpdateController::class, 'updateTesoureiroPerfil'])->middleware('auth');

});




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        $user = auth()->user();

        if($user->permissao == "admin"){
            return redirect('/admin');
        }elseif($user->permissao == "tesoureiro"){
            return redirect('/tesouraria');
        }elseif($user->permissao == "secretario"){
            return redirect('/secretaria');
        }elseif($user->permissao == "coordenador"){
            return redirect('/coordenador');
        }elseif($user->permissao == "vice-coordeandor"){
            return redirect('/vicecoordenador');
        }
    })->name('dashboard');
});
