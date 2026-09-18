<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Policy;
use Illuminate\Http\Request;

class PolicyController extends Controller
{
        public function index()
    {
        // Get the single record or create it if missing
        $policy = Policy::firstOrCreate(['id' => 1]);
        return view('admin.policy.index', compact('policy'));
    }

    public function update(Request $request)
    {
        $policy = Policy::firstOrCreate(['id' => 1]);

        $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $policy->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->back()->with('message', 'Policy Content Updated Successfully');
    }
}
