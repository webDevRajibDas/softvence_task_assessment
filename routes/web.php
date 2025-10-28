<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('admin.dashboard.dashboard-data');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::prefix('admin')->name('admin.')->middleware(['auth', 'verified'])->group(function () {
    #Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    #Route::get('/settings', [MasterSettingController::class, 'Settings'])->name('settings');

    Route::resources([
        'courses' => CourseController::class,
        'categories' => CategoryController::class,
    ]);

});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




require __DIR__.'/auth.php';

