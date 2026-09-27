<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{
    public function index()
    {
        $settings = Setting::first();

        return view('admin.payment-methods.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $settings = Setting::first();

        if (!$settings) {
            return back()->with('error', 'Settings record not found.');
        }

        $settings->update([
            'cod_enabled' => $request->has('cod_enabled'),
            'wish_money_enabled' => $request->has('wish_money_enabled'),
        ]);

        return redirect()
            ->route('admin.payment-methods')
            ->with('message', 'Payment methods updated successfully.');
    }
}