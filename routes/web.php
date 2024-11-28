<?php
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SliderController;


// Auth routes (generated by Laravel Breeze or Jetstream)
Auth::routes();

// Admin Routes (restricted to users with 'admin' role only)
Route::middleware([RoleMiddleware::class])->prefix('admin')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
});

// Regular User Route (Home Page)
Route::get('/home', [HomeController::class, 'index'])->name('home');




Route::get('/', [SliderController::class,'view'])->name('sliders');
// sliders
Route::prefix('admin')->middleware([RoleMiddleware::class])->name('admin.')->group(function () {
    Route::controller(SliderController::class)->prefix('sliders')->name('sliders.')->group(function () {
        // Index - Show all sliders
        Route::get('/', 'index')->name('index');
        
        // Create - Show form for creating a slider
        Route::get('/create', 'create')->name('create');
        
        // Store - Save new slider to the database
        Route::post('/create', 'store')->name('store');
        
        // Edit - Show form for editing an existing slider
        Route::get('/{slider}/edit', 'edit')->name('edit');
        
        // Update - Update the slider in the database
        Route::put('/{slider}', 'update')->name('update');
        
        // Destroy - Delete a slider
        Route::delete('/{slider}', 'destroy')->name('destroy');
    });
});


