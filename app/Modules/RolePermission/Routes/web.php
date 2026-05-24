<?php

use App\Modules\RolePermission\Controllers\RoleController;
use App\Modules\RolePermission\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// if need to protect routes with middleware then modify accordingly
Route::middleware(['auth'])->group(function () {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
});
