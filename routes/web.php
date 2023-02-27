<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\PlayerController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\User;
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

Route::get('/', [HomeController::class, 'index'])->name('/');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profil', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profil', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profil', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::name('admin.')->prefix('admin')->group(function () {
    Route::get('', [AdminController::class, 'index']);
    
    Route::get('/uzivatelia', [UserController::class, 'index'])->name('users')->middleware('can:adminViewAny,App\Models\User');

    #SKUPINY
    Route::get('/skupiny', [GroupController::class, 'index'])->name('groups')->middleware('can:viewAny,App\Models\Group');
    Route::post('/skupiny', [GroupController::class, 'store'])->name('groups.add')->middleware('can:create,App\Models\Group');
    Route::get('/skupiny/upravit/{group}', [GroupController::class, 'edit'])->name('group.edit')->middleware('can:edit,App\Models\Group');
    Route::patch('/skupiny/upravit/{group}', [GroupController::class, 'update'])->middleware('can:edit,App\Models\Group');
    Route::delete('/skupiny/vymazat/{group}', [GroupController::class, 'delete'])->name('group.delete')->middleware('delete:edit,App\Models\Group');
    
    #SKUPINY - UŽÍVATEĽ
    Route::get('/skupiny/uzivatel/{user}', [GroupController::class, 'user'])->name('groups.user')->middleware('can:setUser,App\Models\Group');
    Route::patch('/skupiny/uzivatel/{user}', [GroupController::class, 'userSetGroup'])->name('groups.user.add')->middleware('can:setUser,App\Models\Group');

    #POVOLENIA - UŹÍVATEĽ
    Route::get('/povolenia/uzivatel/{user}', [PermissionController::class, 'user'])->name('permissions.user')->middleware('can:setUser,App\Models\Permission');
    Route::patch('/povolenia/uzivatel/{user}', [PermissionController::class, 'userSave'])->middleware('can:setUser,App\Models\Permission');
    #POVOLENIA - SKUPINY
    Route::get('/povolenia/skupina/{group}', [PermissionController::class, 'group'])->name('permissions.group')->middleware('can:setGroup,App\Models\Permission');
    Route::patch('/povolenia/skupina/{group}', [PermissionController::class, 'groupSave'])->middleware('can:setGroup,App\Models\Permission');


    #HRÁČI
    Route::get('/hraci/vytvorit/{user}', [PlayerController::class, 'create'])->name('players.create')->middleware('can:create,App\Models\Player');
    Route::post('/hraci/vytvorit/{user}', [PlayerController::class, 'store'])->middleware('can:create,App\Models\Player');

    Route::get('/hrac/profil/{player}', [PlayerController::class, 'editAdmin'])->name('player.edit')->middleware('can:editAdmin,App\Models\Player');
    Route::patch('/hrac/profil/{player}', [PlayerController::class, 'updateAdmin'])->middleware('can:editAdmin,App\Models\Player');


});



    #HRÁČI
    Route::get('/hrac/profil', [PlayerController::class, 'edit'])->name('player.edit')->middleware('can:edit,App\Models\Player');
    Route::patch('/hrac/profil', [PlayerController::class, 'update'])->middleware('can:edit,App\Models\Player');










require __DIR__.'/auth.php';
