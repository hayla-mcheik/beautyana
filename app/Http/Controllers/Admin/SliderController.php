<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SliderFormRequest;
use App\Models\Slider;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::latest()->get();

        return view('admin.slider.index', compact('sliders'));
    }


    public function create()
    {
        return view('admin.slider.create');
    }


    public function store(SliderFormRequest $request)
    {
        $validatedData = $request->validated();

        /*
        |--------------------------------------------------------------------------
        | Desktop Image
        |--------------------------------------------------------------------------
        */

        $desktopImage = null;

        if ($request->hasFile('desktop_image')) {

            $file = $request->file('desktop_image');

            $filename = time() . '_desktop.' .
                $file->getClientOriginalExtension();

            $file->move('uploads/sliders/', $filename);

            $desktopImage = 'uploads/sliders/' . $filename;
        }


        /*
        |--------------------------------------------------------------------------
        | Mobile Image
        |--------------------------------------------------------------------------
        */

        $mobileImage = null;

        if ($request->hasFile('mobile_image')) {

            $file = $request->file('mobile_image');

            $filename = time() . '_mobile.' .
                $file->getClientOriginalExtension();

            $file->move('uploads/sliders/', $filename);

            $mobileImage = 'uploads/sliders/' . $filename;
        }


        /*
        |--------------------------------------------------------------------------
        | Status
        |--------------------------------------------------------------------------
        */

        $status = $request->status == true ? '1' : '0';


        Slider::create([
            'title'         => $validatedData['title'],
            'description'   => $validatedData['description'] ?? null,

            // Keep old field as desktop fallback
            'image'         => $desktopImage,

            'desktop_image' => $desktopImage,
            'mobile_image'  => $mobileImage,

            'status'        => $status,
        ]);


        return redirect('admin/sliders')
            ->with('message', 'Slider Added Successfully');
    }


    public function edit(Slider $slider)
    {
        return view('admin.slider.edit', compact('slider'));
    }


    public function update(
        SliderFormRequest $request,
        Slider $slider
    ) {

        $validatedData = $request->validated();


        /*
        |--------------------------------------------------------------------------
        | Desktop Image
        |--------------------------------------------------------------------------
        */

        $desktopImage = $slider->desktop_image;

        if ($request->hasFile('desktop_image')) {

            if (
                $desktopImage &&
                File::exists(public_path($desktopImage))
            ) {
                File::delete(public_path($desktopImage));
            }

            $file = $request->file('desktop_image');

            $filename = time() . '_desktop.' .
                $file->getClientOriginalExtension();

            $file->move('uploads/sliders/', $filename);

            $desktopImage = 'uploads/sliders/' . $filename;
        }


        /*
        |--------------------------------------------------------------------------
        | Mobile Image
        |--------------------------------------------------------------------------
        */

        $mobileImage = $slider->mobile_image;

        if ($request->hasFile('mobile_image')) {

            if (
                $mobileImage &&
                File::exists(public_path($mobileImage))
            ) {
                File::delete(public_path($mobileImage));
            }

            $file = $request->file('mobile_image');

            $filename = time() . '_mobile.' .
                $file->getClientOriginalExtension();

            $file->move('uploads/sliders/', $filename);

            $mobileImage = 'uploads/sliders/' . $filename;
        }


        /*
        |--------------------------------------------------------------------------
        | Status
        |--------------------------------------------------------------------------
        */

        $status = $request->status == true ? '1' : '0';


        $slider->update([
            'title'         => $validatedData['title'],
            'description'   => $validatedData['description'] ?? null,

            'image'         => $desktopImage,

            'desktop_image' => $desktopImage,
            'mobile_image'  => $mobileImage,

            'status'        => $status,
        ]);


        return redirect('admin/sliders')
            ->with('message', 'Slider Updated Successfully');
    }


    public function destroy(Slider $slider)
    {
        /*
        |--------------------------------------------------------------------------
        | Delete Desktop Image
        |--------------------------------------------------------------------------
        */

        if (
            $slider->desktop_image &&
            File::exists(public_path($slider->desktop_image))
        ) {
            File::delete(public_path($slider->desktop_image));
        }


        /*
        |--------------------------------------------------------------------------
        | Delete Mobile Image
        |--------------------------------------------------------------------------
        */

        if (
            $slider->mobile_image &&
            File::exists(public_path($slider->mobile_image))
        ) {
            File::delete(public_path($slider->mobile_image));
        }


        /*
        |--------------------------------------------------------------------------
        | Delete old image if different
        |--------------------------------------------------------------------------
        */

        if (
            $slider->image &&
            $slider->image !== $slider->desktop_image &&
            File::exists(public_path($slider->image))
        ) {
            File::delete(public_path($slider->image));
        }


        $slider->delete();


        return redirect('admin/sliders')
            ->with('message', 'Slider Deleted Successfully');
    }
}