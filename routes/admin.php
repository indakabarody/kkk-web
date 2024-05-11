<?php

use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\IncomeTransactionController as AdminIncomeTransactionController;
use App\Http\Controllers\Admin\OutcomeTransactionController as AdminOutcomeTransactionController;
use App\Http\Controllers\Admin\PasswordController as AdminPasswordController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\Admin\StudentController as AdminStudentController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'active', 'roles:superadmin,admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminHomeController::class, 'index'])->name('dashboard');

    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [AdminProfileController::class, 'edit'])->name('edit');
        Route::put('/', [AdminProfileController::class, 'update'])->name('update');
    });

    Route::prefix('password')->name('password.')->group(function () {
        Route::get('/', [AdminPasswordController::class, 'edit'])->name('edit');
        Route::put('/', [AdminPasswordController::class, 'update'])->name('update');
    });

    Route::resource('/students', AdminStudentController::class);

    Route::resource('/income-transactions', AdminIncomeTransactionController::class);

    Route::resource('/outcome-transactions', AdminOutcomeTransactionController::class);
});
