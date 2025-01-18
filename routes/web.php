<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    //return view('welcome');
    //return view('auth.layout.authlayout');
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/mid', [App\Http\Controllers\MidController::class, 'index'])->name('mids');
    Route::get('/mid/create', [App\Http\Controllers\MidController::class, 'create'])->name('mid/create');
    Route::post('/savemid', [App\Http\Controllers\MidController::class, 'store'])->name('savemid');
    Route::get('/mid/{roleId}/edit', [App\Http\Controllers\MidController::class, 'edit']);
    Route::post('/midupdate/{roleId}', [App\Http\Controllers\MidController::class, 'update']);
    Route::get('/mid/{roleId}/delete', [App\Http\Controllers\MidController::class, 'destroy']);


    Route::get('/midfees', [App\Http\Controllers\MidFeesController::class, 'index'])->name('midfees');
    Route::get('/midfees/create', [App\Http\Controllers\MidFeesController::class, 'create'])->name('midfees/create');
    Route::post('/savemidfees', [App\Http\Controllers\MidFeesController::class, 'store'])->name('savemidfees');
    Route::get('/midfees/{roleId}/edit', [App\Http\Controllers\MidFeesController::class, 'edit']);
    Route::post('/feesupdate/{roleId}', [App\Http\Controllers\MidFeesController::class, 'update']);
    Route::get('/midfees/{roleId}/delete', [App\Http\Controllers\MidFeesController::class, 'destroy']);

    Route::get('/midfees/{roleId}/upload', [App\Http\Controllers\MidFeesController::class, 'upload'])->name('Midfees/Upload/Excel');
    Route::post('/uploadexcel/{roleId}', [App\Http\Controllers\MidFeesController::class, 'uploadexcel']);
});

Route::group(['middleware' => ['auth', 'role:super-admin|admin']], function () {

    Route::resource('permissions', App\Http\Controllers\PermissionController::class);
    Route::get('permissions/{permissionId}/delete', [App\Http\Controllers\PermissionController::class, 'destroy']);

    Route::resource('roles', App\Http\Controllers\RoleController::class);
    Route::get('roles/{roleId}/delete', [App\Http\Controllers\RoleController::class, 'destroy']);
    Route::get('roles/{roleId}/give-permissions', [App\Http\Controllers\RoleController::class, 'addPermissionToRole']);
    Route::put('roles/{roleId}/give-permissions', [App\Http\Controllers\RoleController::class, 'givePermissionToRole']);

    Route::resource('users', App\Http\Controllers\UserController::class);
    Route::get('users/{userId}/delete', [App\Http\Controllers\UserController::class, 'destroy']);
});

require __DIR__ . '/auth.php';
