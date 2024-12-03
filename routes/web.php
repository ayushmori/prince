<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;

Auth::routes();

Route::middleware([RoleMiddleware::class])->prefix('admin')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('brands', [BrandController::class, 'index'])->name('brands.index');
    Route::get('brands/create/{id?}', [BrandController::class, 'form'])->name('brands.create'); // Correct name
    Route::post('brands/save/{id?}', [BrandController::class, 'save'])->name('brands.save');
    Route::delete('brands/delete/{id}', [BrandController::class, 'delete'])->name('brands.delete');
});


Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', [SliderController::class,'view'])->name('sliders');

// Admin middleware routes for Sliders
Route::prefix('admin')->middleware([RoleMiddleware::class])->name('admin.')->group(function () {
    Route::controller(SliderController::class)->prefix('sliders')->name('sliders.')->group(function () {
        Route::get('/', 'index')->name('index'); // Show all sliders
        Route::get('/create', 'create')->name('create'); // Show form for creating a slider
        Route::post('/create', 'store')->name('store'); // Save new slider
        Route::get('/{slider}/edit', 'edit')->name('edit'); // Show form for editing slider
        Route::put('/{slider}', 'update')->name('update'); // Update slider
        Route::delete('/{slider}', 'destroy')->name('destroy'); // Delete slider
    });

});
Route::prefix('admin')->middleware([RoleMiddleware::class])->name('admin.')->group(function () {
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
});

// Route::get('news', [NewsController::class, 'index'])->name('news');
// Route::get('news/{id}', [NewsController::class, 'newsview'])->name('newsview');
// Route::get('admin/news', [NewsController::class, 'Adminindex'])->name('news.admin');
// Route::get('admin/news/create', [NewsController::class, 'create'])->name('news.create');
// Route::post('admin/news', [NewsController::class, 'store'])->name('news.store');
// Route::get('admin/news/{id}/edit', [NewsController::class, 'edit'])->name('news.edit');
// Route::put('admin/news/{id}', [NewsController::class, 'update'])->name('news.update');
// Route::delete('admin/news/{id}', [NewsController::class, 'destroy'])->name('news.destroy');
// Route::get('admin/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');


Route::middleware([RoleMiddleware::class])->prefix('admin')->group(function () {
    Route::get('brands', [BrandController::class, 'index'])->name('brands.index');
    Route::get('brands/create/{id?}', [BrandController::class, 'form'])->name('brands.create'); // Correct name
    Route::post('brands/save/{id?}', [BrandController::class, 'save'])->name('brands.save');
    Route::delete('brands/delete/{id}', [BrandController::class, 'delete'])->name('brands.delete');
});
