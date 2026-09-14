<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{
    private function uploadBreadcrumbImage(
    Request $request,
    $field,
    $oldPath = null
) {
    if (!$request->hasFile($field)) {
        return $oldPath;
    }

    $image = $request->file($field);

    $uploadPath = public_path('uploads/settings');

    if (!File::exists($uploadPath)) {
        File::makeDirectory(
            $uploadPath,
            0755,
            true
        );
    }

    // Delete old image
    if (
        $oldPath &&
        File::exists(public_path($oldPath))
    ) {
        File::delete(
            public_path($oldPath)
        );
    }

    $filename =
        $field . '_' .
        time() . '_' .
        uniqid() . '.' .
        $image->getClientOriginalExtension();

    $image->move(
        $uploadPath,
        $filename
    );

    return 'uploads/settings/' . $filename;
}
    public function index()
    {
        $setting = Setting::first();

        return view(
            'admin.setting.index',
            compact('setting')
        );
    }


    public function store(Request $request)
    {
        $request->validate([
            'website_name' => 'nullable|string|max:255',
            'website_url'  => 'nullable|string|max:255',

            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
'breadcrumb_about' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
'breadcrumb_contact' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
'breadcrumb_categories' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
'breadcrumb_collections' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
'breadcrumb_accessories' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
'breadcrumb_onsale' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'address' => 'nullable|string|max:500',
            'phone1'  => 'nullable|string|max:255',

            'email1' => 'nullable|email|max:255',

            'instagram' => 'nullable|string|max:255',
            'youtube'   => 'nullable|string|max:255',
        ]);


        /*
        |--------------------------------------------------------------------------
        | Get Existing Setting
        |--------------------------------------------------------------------------
        */

        $setting = Setting::first();


        /*
        |--------------------------------------------------------------------------
        | Logo Upload
        |--------------------------------------------------------------------------
        */

        $logoPath = $setting->logo ?? null;


        if ($request->hasFile('logo')) {

            $logo = $request->file('logo');

            $uploadPath = public_path('uploads/settings');


            /*
            | Create directory if it doesn't exist
            */

            if (!File::exists($uploadPath)) {

                File::makeDirectory(
                    $uploadPath,
                    0755,
                    true
                );

            }


            /*
            | Delete old logo
            */

            if (
                $logoPath &&
                File::exists(public_path($logoPath))
            ) {

                File::delete(
                    public_path($logoPath)
                );

            }


            /*
            | Generate unique filename
            */

            $filename =
                time() .
                '_' .
                uniqid() .
                '.' .
                $logo->getClientOriginalExtension();


            /*
            | Move logo
            */

            $logo->move(
                $uploadPath,
                $filename
            );


            /*
            | Save relative path
            */

            $logoPath =
                'uploads/settings/' .
                $filename;
        }


        /*
|--------------------------------------------------------------------------
| Breadcrumb Image Upload
|--------------------------------------------------------------------------
*/

$breadcrumbImagePath = $setting->breadcrumb_image ?? null;

if ($request->hasFile('breadcrumb_image')) {

    $breadcrumbImage = $request->file('breadcrumb_image');

    $uploadPath = public_path('uploads/settings');

    if (!File::exists($uploadPath)) {

        File::makeDirectory(
            $uploadPath,
            0755,
            true
        );
    }

    /*
    | Delete old breadcrumb image
    */

    if (
        $breadcrumbImagePath &&
        File::exists(public_path($breadcrumbImagePath))
    ) {

        File::delete(
            public_path($breadcrumbImagePath)
        );
    }

    /*
    | Generate unique filename
    */

    $filename =
        'breadcrumb_' .
        time() .
        '_' .
        uniqid() .
        '.' .
        $breadcrumbImage->getClientOriginalExtension();

    /*
    | Move image
    */

    $breadcrumbImage->move(
        $uploadPath,
        $filename
    );

    /*
    | Save relative path
    */

    $breadcrumbImagePath =
        'uploads/settings/' .
        $filename;
}
        /*
        |--------------------------------------------------------------------------
        | Data
        |--------------------------------------------------------------------------
        */
        $breadcrumbAbout = $this->uploadBreadcrumbImage(
    $request,
    'breadcrumb_about',
    $setting->breadcrumb_about ?? null
);

$breadcrumbContact = $this->uploadBreadcrumbImage(
    $request,
    'breadcrumb_contact',
    $setting->breadcrumb_contact ?? null
);

$breadcrumbCategories = $this->uploadBreadcrumbImage(
    $request,
    'breadcrumb_categories',
    $setting->breadcrumb_categories ?? null
);

$breadcrumbCollections = $this->uploadBreadcrumbImage(
    $request,
    'breadcrumb_collections',
    $setting->breadcrumb_collections ?? null
);

$breadcrumbAccessories = $this->uploadBreadcrumbImage(
    $request,
    'breadcrumb_accessories',
    $setting->breadcrumb_accessories ?? null
);

$breadcrumbOnSale = $this->uploadBreadcrumbImage(
    $request,
    'breadcrumb_onsale',
    $setting->breadcrumb_onsale ?? null
);

        $data = [

            'website_name' => $request->website_name,

            'website_url' => $request->website_url,

            'logo' => $logoPath,
            'breadcrumb_image' => $breadcrumbImagePath,
'breadcrumb_about' => $breadcrumbAbout,
'breadcrumb_contact' => $breadcrumbContact,
'breadcrumb_categories' => $breadcrumbCategories,
'breadcrumb_collections' => $breadcrumbCollections,
'breadcrumb_accessories' => $breadcrumbAccessories,
'breadcrumb_onsale' => $breadcrumbOnSale,

            'address' => $request->address,

            'phone1' => $request->phone1,

            'email1' => $request->email1,

            'instagram' => $request->instagram,

            'youtube' => $request->youtube,

        ];


        /*
        |--------------------------------------------------------------------------
        | Update / Create
        |--------------------------------------------------------------------------
        */

        if ($setting) {

            $setting->update($data);

        } else {

            Setting::create($data);

        }


        return redirect()
            ->back()
            ->with('message', 'Settings Saved');
    }
}