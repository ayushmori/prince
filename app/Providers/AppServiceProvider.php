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
        // Use Bootstrap for pagination
        Paginator::useBootstrap();

        // Fetch the first AboutSettings record and share it with all views
        $aboutSettings = AboutSettings::first();
        View::share('aboutSettings', $aboutSettings);

        // Share brands and categories with all views
        View::share('brands', Brand::orderBy('name', 'asc')->limit(4)->get());
        View::share('categories', Category::orderBy('name', 'asc')->limit(4)->get());

        // Share categories with 'navbar' view, fetching parent categories
        View::composer('partials.navbar', function ($view) {
            $categories = Category::with('parentCategory')->whereNull('parent_id')->get();
            $view->with('categories', $categories);
        });

        // If you need to share all categories with all views, this can be done
        // directly as we already shared a limited set of categories above.
        View::share('allCategories', Category::with('parentCategory')->whereNull('parent_id')->get());
    }
}
