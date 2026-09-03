<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{
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
        | Data
        |--------------------------------------------------------------------------
        */

        $data = [

            'website_name' => $request->website_name,

            'website_url' => $request->website_url,

            'logo' => $logoPath,

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