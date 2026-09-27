<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProfitController extends Controller
{
    public function index()
    {
        // Total number of products for the summary card
        $totalProducts = Product::count();

        // Get products ordered from latest to oldest
        // and paginate 10 products per page
        $products = Product::with([
            'category',
            'productImages'
        ])
            ->latest()
            ->paginate(10);

        // Calculate stock cost for ALL products
        $totalStockCost = Product::query()
            ->get()
            ->sum(function ($product) {
                return (float) $product->initial_cost * (int) $product->quantity;
            });

        // Calculate potential profit for ALL products
        $totalPotentialProfit = Product::query()
            ->get()
            ->sum(function ($product) {
                $profitPerItem =
                    (float) $product->selling_price -
                    (float) $product->initial_cost;

                return $profitPerItem * (int) $product->quantity;
            });

        return view('admin.profit.index', compact(
            'products',
            'totalProducts',
            'totalStockCost',
            'totalPotentialProfit'
        ));
    }
}