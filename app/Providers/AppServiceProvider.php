<?php

namespace App\Providers;

use App\Models\AboutSettings;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        Paginator::useBootstrap();

        // Share the About settings
        $aboutSettings = AboutSettings::first(); // Fetch the first AboutSettings record
        View::share('aboutSettings', $aboutSettings); // Share it with all


        // Share categories with all views
    View::share('brands', Brand::orderBy('name', 'asc')->limit(4)->get());
    View::share('categories',  Category::with('parentCategory')->whereNull('parent_id')->get());
    }
}
