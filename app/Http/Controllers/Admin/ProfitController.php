<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProfitController extends Controller
{
    public function index()
    {
        $products = Product::with([
            'category',
            'productImages'
        ])->get();

        $totalStockCost = $products->sum(function ($product) {
            return (float) $product->initial_cost * (int) $product->quantity;
        });

        $totalPotentialProfit = $products->sum(function ($product) {
            $profitPerItem =
                (float) $product->selling_price -
                (float) $product->initial_cost;

            return $profitPerItem * (int) $product->quantity;
        });

        return view('admin.profit.index', compact(
            'products',
            'totalStockCost',
            'totalPotentialProfit'
        ));
    }
}