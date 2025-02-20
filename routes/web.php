<?php

use App\Http\Livewire\Products;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\DocumentTypeController;
use App\Http\Controllers\MainDocumentController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\admin\DocumentController;
use App\Http\Controllers\admin\AttributeController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MiniSliderController;
use App\Http\Controllers\Frontend\FrontendController;

Auth::routes();
use App\Http\Controllers\Admin\SecondSliderController;

Route::get('/products', Products::class);




//<---------------------------------------Frontend Controller -------------------------------------------------------->//

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('news', [NewsController::class, 'index'])->name('news');
Route::get('news/{id}', [NewsController::class, 'newsview'])->name('newsview');
Route::get('/', [SliderController::class, 'view'])->name('sliders');
Route::get('/api/categories', [CategoryController::class, 'getCategories']);
Route::get('/api/categories/{categoryId}/children', [CategoryController::class, 'getChildren']);
Route::get('/api/products', [FrontendController::class, 'filterProducts'])->name('products.filter');
Route::get('/api/subcategories', [FrontendController::class, 'filterSubcategories'])->name('categories.filter');

Route::post('/api/cart/add/{product}', [CartController::class, 'addToCart']);
Route::get('/api/cart', [CartController::class, 'getCartCount']);

// Route::apiResource('main-documents', MainDocumentController::class);

Route::get('/product/{id}', [FrontendController::class, 'showProduct']);

Route::get('/about-us', [FrontendController::class, 'aboutpage']);
Route::get('/contact-us', [FrontendController::class, 'contactpage']);
Route::get('/products', [FrontendController::class, 'products']);

Route::get('/download', [FrontendController::class, 'download'])->name('dwld');
Route::post('/submit-form', [ContactUsController::class, 'submit']);
Route::get('/subcategory/{category_id}', [FrontendController::class, 'show'])->name('subcategory');
Route::get('/categories', [FrontendController::class, 'view'])->name('categories.index');
Route::get('/category/{id}', [FrontendController::class, 'show'])->name('category.show');
Route::get('/get-children/{categoryId}', [FrontendController::class, 'getChildren']);

// Add To Cart
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::put('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');


// Downloads
Route::get('/download', [DownloadController::class, 'downloadPage'])->name('download.page');


Route::get('categories', [CategoryController::class, 'view'])->name('categories.view');
Route::get('/category/{slug}', [CategoryController::class, 'viewSubcategory'])->name('category.view');


Route::get('/category/{category}/children', [CategoryController::class, 'getChildren'])->name('categories.children');
Route::get('/category/{id}/ancestors', [CategoryController::class, 'getAncestors']);
Route::get('/admin/products/subcategories/{categoryId}', [CategoryController::class, 'getSubcategories']);



Route::Resource('admin/products', ProductController::class)->middleware([RoleMiddleware::class]);
Route::Resource('admin/products.attributes', AttributeController::class)->middleware([RoleMiddleware::class]);
Route::Resource('admin/products.documents', DocumentController::class)->middleware([RoleMiddleware::class]);

Route::get('admin/products/subcategories/{categoryId}', [ProductController::class, 'getSubcategories'])->middleware([RoleMiddleware::class]);








// <------------------------------------------Admin Middleware and Controllers-------------------------------------------------->//

Route::prefix('admin')->middleware([RoleMiddleware::class])->group(function () {
    Route::get('/main-documents', [MainDocumentController::class, 'index'])->name('main-documents.index');  // To display the list or form
    Route::get('/main-documents/create', [MainDocumentController::class, 'create'])->name('main-documents.create'); // For creating a new document form
    Route::post('/main-documents', [MainDocumentController::class, 'store'])->name('main-documents.store');  // For storing the new document
    Route::get('/main-documents/edit/{id}', [MainDocumentController::class, 'edit'])->name('main-documents.edit');
    Route::put('/main-documents/update/{id}', [MainDocumentController::class, 'update'])->name('main-documents.update');
    Route::delete('/main-documents/{id}', [MainDocumentController::class, 'destroy'])->name('admin.main-documents.destroy');

    // Route::put('/main-documents/update/{id}', [MainDocumentController::class, 'update'])->name('main-documents.update');

    Route::get('document-types', [DocumentTypeController::class, 'index'])->name('admin.document-types.index');

});


Route::prefix('admin')->middleware([RoleMiddleware::class])->group(function () {






    Route::get('settings/about-us', [App\Http\Controllers\Admin\AboutUsController::class, 'about']);
    Route::post('settings/about-us', [App\Http\Controllers\Admin\AboutUsController::class, 'store']);

    Route::get('/contact-us', [App\Http\Controllers\Admin\ContactUsController::class, 'adminPanel']);






    // main-document






    //<---------------------------------------Category Controllers -------------------------------------------------------->//

    Route::controller(CategoryController::class)->prefix('categories')->group(function () {
        Route::get('/', 'index')->name('admin.categories.index');
        Route::get('/create', 'create')->name('admin.categories.create');
        Route::post('/', 'store')->name('admin.categories.store');
        Route::get('/{category}/edit', 'edit')->name('admin.categories.edit');
        Route::put('/{category}', 'update')->name('admin.categories.update');
        Route::delete('/{category}', 'destroy')->name('admin.categories.destroy');
    });

    //<---------------------------------------News Controllers -------------------------------------------------------->//

    Route::controller(NewsController::class)->prefix('news')->group(function () {
        Route::get('/', 'Adminindex')->name('admin.news');
        Route::get('/create', 'create')->name('admin.news.create');
        Route::post('/', 'store')->name('admin.news.store');
        Route::get('/{id}/edit', 'edit')->name('admin.news.edit');
        Route::put('/{id}', 'update')->name('admin.news.update');
        Route::delete('/{id}', 'destroy')->name('admin.news.destroy');
    });

    //<---------------------------------------Brand Controllers -------------------------------------------------------->//


    Route::controller(BrandController::class)->prefix('brands')->group(function () {
        Route::get('/', 'index')->name('admin.brands.index');
        Route::get('/create/{id?}', 'form')->name('admin.brands.create');
        Route::post('/save/{id?}', 'save')->name('admin.brands.save');
        Route::delete('/delete/{id}', 'delete')->name('admin.brands.delete');
    });

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/all-slider', [DashboardController::class, 'slider']);
    Route::get('/all-slider/create', [DashboardController::class, 'create']);
});









//<---------------------------------------Slider Controllers -------------------------------------------------------->//


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
Route::prefix('admin')->middleware([RoleMiddleware::class])->group(function () {
    Route::controller(SecondSliderController::class)->prefix('secondsliders')->name('admin.secondsliders.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/create', 'store')->name('store');
        Route::get('/{secondSlider}/edit', 'edit')->name('edit');
        Route::put('/{secondSlider}', 'update')->name('update');
        Route::delete('/{secondSlider}', 'destroy')->name('destroy');
    });
});
Route::prefix('admin')->middleware([RoleMiddleware::class])->group(function () {
    Route::controller(MiniSliderController::class)->prefix('minisiders')->name('admin.minisiders.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/create', 'store')->name('store');
        Route::get('/{minisiders}/edit', 'edit')->name('edit');
        Route::put('/{minisiders}', 'update')->name('update');
        Route::delete('/{minisiders}', 'destroy')->name('destroy');
    });
});


// Route::prefix('admin')->middleware([RoleMiddleware::class])->group(function () {
//     Route::get('documents-type', [DocumentTypeController::class, 'index'])->name('admin.documents-type.index');
//     Route::get('documents-type/create', [DocumentTypeController::class, 'create'])->name('admin.documents-type.create');
//     Route::post('documents-type', [DocumentTypeController::class, 'store'])->name('admin.documents-type.store');
//     Route::get('documents-type/{documents_type}/edit', [DocumentTypeController::class, 'edit'])->name('admin.documents-type.edit');
//     Route::put('documents-type/{documents_type}', [DocumentTypeController::class, 'update'])->name('admin.documents-type.update');
//     Route::delete('documents-type/{documents_type}', [DocumentTypeController::class, 'destroy'])->name('admin.documents-type.destroy');
// });

Route::prefix('admin')->middleware([RoleMiddleware::class])->group(function () {
    Route::get('document-types', [DocumentTypeController::class, 'index'])->name('admin.document-types.index');
    Route::get('document-types/create', [DocumentTypeController::class, 'create'])->name('admin.document-types.create');
    Route::post('document-types', [DocumentTypeController::class, 'store'])->name('admin.document-types.store');
    Route::get('document-types/{id}/edit', [DocumentTypeController::class, 'edit'])->name('admin.document-types.edit');
    Route::put('document-types/{id}', [DocumentTypeController::class, 'update'])->name('admin.document-types.update');
    Route::delete('document-types/{id}', [DocumentTypeController::class, 'destroy'])->name('admin.document-types.destroy');
    Route::delete('/admin/documents-type/{id}', [DocumentTypeController::class, 'destroy'])->name('admin.document-types.destroy');  
    Route::delete('document-types/{id}', [DocumentTypeController::class, 'destroy'])->name('admin.documents-type.delete');
    Route::post('documents-type/save/{id?}', [DocumentTypeController::class, 'save'])->name('admin.documents-type.save');
    Route::get('document-types/form', [DocumentTypeController::class, 'form'])->name('admin.documents-type.form');
});

Route::resource('document-types', DocumentTypeController::class);

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('documents-type', DocumentTypeController::class);
});



