<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutDataController extends Controller
{
    /**
     * Display the About page edit form.
     */
    public function edit()
    {
        $about = AboutData::first() ?? new AboutData();
        return view('admin.aboutdata.edit', compact('about'));
    }

    /**
     * Update or Create the About page data.
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'title'        => 'required|string|max:255',
            'description'  => 'required|string',
            'years'        => 'required|integer|min:0',
            'titleone'     => 'nullable|string|max:255',
            'titletwo'     => 'nullable|string|max:255',
            'titlethree'   => 'nullable|string|max:255',
            'iconone'      => 'nullable|string|max:255',
            'icontwo'      => 'nullable|string|max:255',
            'iconthree'    => 'nullable|string|max:255',
            'imgone'       => 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048',
            'imgtwo'       => 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048',
            'imgthree'     => 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048',
        ]);

        $about = AboutData::first() ?? new AboutData();

        // Map standard text inputs
        $about->title       = $request->input('title');
        $about->description = $request->input('description');
        $about->years       = $request->input('years');
        $about->titleone    = $request->input('titleone');
        $about->titletwo    = $request->input('titletwo');
        $about->titlethree  = $request->input('titlethree');
        $about->iconone     = $request->input('iconone');
        $about->icontwo     = $request->input('icontwo');
        $about->iconthree   = $request->input('iconthree');

        // Loop through images using the clean Storage Facade approach
        $images = ['imgone', 'imgtwo', 'imgthree'];
        foreach ($images as $imgKey) {
            if ($request->hasFile($imgKey)) {
                
                // 1. Delete the old file from public storage disk if it exists
                if ($about->$imgKey && Storage::disk('public')->exists($about->$imgKey)) {
                    Storage::disk('public')->delete($about->$imgKey);
                }

                // 2. Store the file securely in storage/app/public/about
                // It automatically generates a secure, unique cryptographic hash filename
                $path = $request->file($imgKey)->store('about', 'public');
                
                // 3. Save the path reference (e.g., "about/xyz123.jpg") to your DB
                $about->$imgKey = $path;
            }
        }

        $about->save();

        return redirect()->back()->with('message', 'About page data updated successfully!');
    }
}