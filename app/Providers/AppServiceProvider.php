<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\userGioHang;
use App\Models\userCategory;

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
    public function boot(): void
    {
        Paginator::useBootstrap();

        view() -> composer('*', function ($view) {
            $cart = new userGioHang();
            $LSP1 = new userCategory();
            $LSP = $LSP1->LSP;
            $view->with(compact('cart', 'LSP'));
        });
    }
}
