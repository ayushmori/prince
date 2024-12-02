<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\NewsController;


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
Route::prefix('admin')->middleware([RoleMiddleware::class])->name('admin.')->group(function () {
    Route::controller(SliderController::class)->prefix('sliders')->name('sliders.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/create', 'store')->name('store');
        Route::get('/{slider}/edit', 'edit')->name('edit');
        Route::put('/{slider}', 'update')->name('update');
        Route::delete('/{slider}', 'destroy')->name('destroy');
    });

});

Route::get('news', [NewsController::class, 'index'])->name('news');
Route::get('news/{id}', [NewsController::class, 'newsview'])->name('newsview');
Route::get('admin/news', [NewsController::class, 'Adminindex'])->name('news.admin');
Route::get('admin/news/create', [NewsController::class, 'create'])->name('news.create');
Route::post('admin/news', [NewsController::class, 'store'])->name('news.store');
Route::get('admin/news/{id}/edit', [NewsController::class, 'edit'])->name('news.edit');
Route::put('admin/news/{id}', [NewsController::class, 'update'])->name('news.update');
Route::delete('admin/news/{id}', [NewsController::class, 'destroy'])->name('news.destroy');
Route::get('admin/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');


