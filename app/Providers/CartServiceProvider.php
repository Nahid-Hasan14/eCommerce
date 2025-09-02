<?php

namespace App\Providers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class CartServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {

            $cartItems = Session::get('cart', []);

            $cartTotal = 0;
            foreach (Session::get('cart', []) as $item) {
                $cartTotal += $item['price'] * $item['quantity'];
            }
            
            $view->with('cartTotal', $cartTotal);
            $view->with('cartItems', $cartItems);
        });
    }
}
