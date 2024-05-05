<?php

namespace App\Providers;
use App\Models\Category;
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
        // استخدام View Composer لتمرير المتغير $categories إلى العرض layouts.app
        view()->composer('layouts.app', function ($view) {
            $categories = Category::all();
            $view->with('categories', $categories);
        });
    }
}
