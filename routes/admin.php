<?php

use App\Http\Controllers\Admin\AuditLogController;
use App\Http\Controllers\Admin\DependencyController;
use App\Http\Controllers\Admin\DirectionController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\ProcessesStateController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UpgradeProposalsStateController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\UserProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::redirect('/', '/login');

// Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // Permissions
    Route::resource('permissions', PermissionController::class, ['except' => ['store', 'update', 'destroy']]);

    // Roles
    Route::resource('roles', RoleController::class, ['except' => ['store', 'update', 'destroy']]);

    // Users
    Route::post('users/csv', [UserController::class, 'csvStore'])->name('users.csv.store');
    Route::put('users/csv', [UserController::class, 'csvUpdate'])->name('users.csv.update');
    Route::resource('users', UserController::class, ['except' => ['store', 'update', 'destroy']]);

    // Direction
    Route::post('directions/csv', [DirectionController::class, 'csvStore'])->name('directions.csv.store');
    Route::put('directions/csv', [DirectionController::class, 'csvUpdate'])->name('directions.csv.update');
    Route::resource('directions', DirectionController::class, ['except' => ['store', 'update', 'destroy', 'show']]);

    // Dependency
    Route::post('dependencies/csv', [DependencyController::class, 'csvStore'])->name('dependencies.csv.store');
    Route::put('dependencies/csv', [DependencyController::class, 'csvUpdate'])->name('dependencies.csv.update');
    Route::resource('dependencies', DependencyController::class, ['except' => ['store', 'update', 'destroy', 'show']]);

    // Processes State
    Route::post('processes-states/csv', [ProcessesStateController::class, 'csvStore'])->name('processes-states.csv.store');
    Route::put('processes-states/csv', [ProcessesStateController::class, 'csvUpdate'])->name('processes-states.csv.update');
    Route::resource('processes-states', ProcessesStateController::class, ['except' => ['store', 'update', 'destroy', 'show']]);

    // Upgrade Proposals State
    Route::post('upgrade-proposals-states/csv', [UpgradeProposalsStateController::class, 'csvStore'])->name('upgrade-proposals-states.csv.store');
    Route::put('upgrade-proposals-states/csv', [UpgradeProposalsStateController::class, 'csvUpdate'])->name('upgrade-proposals-states.csv.update');
    Route::resource('upgrade-proposals-states', UpgradeProposalsStateController::class, ['except' => ['store', 'update', 'destroy', 'show']]);

    // Audit Logs
    Route::resource('audit-logs', AuditLogController::class, ['except' => ['store', 'update', 'destroy', 'create', 'edit']]);

    // Attachments Type
    Route::post('attachments-types/csv', [AttachmentsTypeController::class, 'csvStore'])->name('attachments-types.csv.store');
    Route::put('attachments-types/csv', [AttachmentsTypeController::class, 'csvUpdate'])->name('attachments-types.csv.update');
    Route::resource('attachments-types', AttachmentsTypeController::class, ['except' => ['store', 'update', 'destroy']]);

    // Attachments Category
    Route::post('attachments-categories/csv', [AttachmentsCategoryController::class, 'csvStore'])->name('attachments-categories.csv.store');
    Route::put('attachments-categories/csv', [AttachmentsCategoryController::class, 'csvUpdate'])->name('attachments-categories.csv.update');
    Route::resource('attachments-categories', AttachmentsCategoryController::class, ['except' => ['store', 'update', 'destroy']]);

    // Input
    Route::post('inputs/csv', [InputController::class, 'csvStore'])->name('inputs.csv.store');
    Route::put('inputs/csv', [InputController::class, 'csvUpdate'])->name('inputs.csv.update');
    Route::resource('inputs', InputController::class, ['except' => ['store', 'update', 'destroy']]);

    // Glossary
    Route::resource('glossaries', GlossaryController::class, ['except' => ['store', 'update', 'destroy']]);
});

// Route::group(['prefix' => 'profile', 'as' => 'profile.', 'middleware' => ['auth']], function () {
//     if (file_exists(app_path('Http/Controllers/Auth/UserProfileController.php'))) {
//         Route::get('/', [UserProfileController::class, 'show'])->name('show');
//     }
// });
