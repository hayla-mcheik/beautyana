<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;

use App\Models\Setting;
use App\Models\Cart;
use App\Models\Menu;
use App\Models\Ticker;
use App\Models\Category;

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

        /*
        |--------------------------------------------------------------------------
        | Global Settings
        |--------------------------------------------------------------------------
        */
        $websiteSetting = Setting::first();
        View::share('appSetting', $websiteSetting);

        /*
        |--------------------------------------------------------------------------
        | FRONTEND DATA (MENUS + CATEGORIES + SUBCATEGORIES)
        |--------------------------------------------------------------------------
        */

View::composer(
    ['layouts.app', 'layouts.inc.frontend.header', 'layouts.inc.frontend.footer'],
    function ($view) {

        $menus = Menu::where('status', 1)
   ->with([
    'categories' => function ($q) {
        $q->where('status', '0');
    }
])
            ->orderBy('sort_order')
            ->get();

        $tickers = Ticker::take(3)->get();

        // ✅ ADD THIS
        $allCategories = Category::where('status', 0)->get();

        $view->with([
            'menus' => $menus,
            'tickers' => $tickers,
            'allCategories' => $allCategories, // 👈 important
        ]);
    }
);

        /*
        |--------------------------------------------------------------------------
        | CART (GLOBAL)
        |--------------------------------------------------------------------------
        */
        View::composer('*', function ($view) {

            $cartItems = collect();

            if (auth()->check()) {
                $cartItems = Cart::where('user_id', auth()->user()->id)
                    ->with('product.productImages')
                    ->get();
            }

            $view->with('carts', $cartItems);
        });
    }
}