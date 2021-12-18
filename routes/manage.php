<?php

use App\Http\Controllers\Manage\ManageAdminLoginController;
use App\Http\Controllers\Manage\ManageAdminUserController;
use App\Http\Controllers\Manage\ManageDashboardController;
use App\Http\Controllers\Manage\ManagePermissionController;
use App\Http\Controllers\Manage\ManageRoleController;
use App\Http\Controllers\Manage\ManageUserController;
use Illuminate\Support\Facades\Route;

Route::prefix('manage')->name('manage.')->group(function () {
    Route::get('/', function () {
        return 'It works';
    });

    Route::post('/login', [ManageAdminLoginController::class, 'store'])->middleware('guest:manage');
    Route::get('/login', [ManageAdminLoginController::class, 'create'])->middleware('guest:manage')->name('login');
    Route::post('/logout', [ManageAdminLoginController::class, 'destroy'])->middleware('auth:manage')->name('logout');

    Route::get('/dashboard', [ManageDashboardController::class, 'dashboard'])->middleware(['auth:manage'])->name('dashboard');


    Route::middleware(['auth:manage','permission'])->group(function () {
        Route::resources(['admins' => ManageAdminUserController::class]);
        Route::resources(['users' => ManageUserController::class], ['only' => [
            'index', 'show', 'update'
        ]]);
        Route::resources(['roles' => ManageRoleController::class]);
        Route::resources(['permissions' => ManagePermissionController::class]);
    });
});
