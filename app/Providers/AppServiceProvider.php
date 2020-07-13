<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;
use App\User;
use App\Category;
use App\Subcategory;
use App\Tag;
use View;
use Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->environment() === 'production'){
          $this->app['request']->server->set('HTTPS', true);
        }

        Schema::defaultStringLength(191);

        View::composer(['*'], function($view) {
            $user = Auth::user();
            $categories = Category::paginate(3);
            $subcategories = Subcategory::all();
            $tags = Tag::all();
            $view->with('user', $user)
                    ->with('categories', $categories)
                    ->with('subcategories', $subcategories)
                    ->with('tags', $tags);
        });

        Paginator::defaultView('pagination::materialize');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
