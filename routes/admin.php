<?php

use App\Http\Controllers\Admin\DependencyController;
use App\Http\Controllers\Admin\DirectionController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\ProcessesStateController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UpgradeProposalsStateController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

// Route::redirect('/', '/login');

// Auth::routes(['register' => false]);

Route::get('/admin', [HomeController::class, 'index'])->name('admin.home');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function () {

    // Permissions
    Route::resource('permissions', PermissionController::class, ['except' => ['store', 'update', 'destroy']]);

    // Roles
    Route::resource('roles', RoleController::class, ['except' => ['store', 'update', 'destroy']]);

    // Users
    Route::resource('users', UserController::class, ['except' => ['store', 'update', 'destroy']]);

    // Direction
    Route::resource('directions', DirectionController::class, ['except' => ['store', 'update', 'destroy', 'show']]);

    // Dependency
    Route::resource('dependencies', DependencyController::class, ['except' => ['store', 'update', 'destroy', 'show']]);

    // Processes State
    Route::resource('processes-states', ProcessesStateController::class, ['except' => ['store', 'update', 'destroy', 'show']]);

    // Upgrade Proposals State
    Route::resource('upgrade-proposals-states', UpgradeProposalsStateController::class, ['except' => ['store', 'update', 'destroy', 'show']]);
});

// Route::group(['prefix' => 'profile', 'as' => 'profile.', 'middleware' => ['auth']], function () {
//     if (file_exists(app_path('Http/Controllers/Auth/UserProfileController.php'))) {
//         Route::get('/', [UserProfileController::class, 'show'])->name('show');
//     }
// });
