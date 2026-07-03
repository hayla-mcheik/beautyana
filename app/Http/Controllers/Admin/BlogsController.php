<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blogs;
use App\Models\BlogImage;
use Illuminate\Support\Facades\Storage;

class BlogsController extends Controller
{
    public function index()
    {
       $blogs = Blogs::with('images')->get();
        return view('admin.blogs.index',compact('blogs'));
    }
    public function create()
    {
    
        return view('admin.blogs.create');
    }
    
  public function store(Request $request)
{
    $this->validate($request, [

        'title' => 'required|string|max:255',

        'by' => 'required|string|max:255',

        'date' => 'required|date',

        'description' => 'required|string|max:3000',

        'image' => 'required|image|mimes:jpeg,jpg,png,webp|max:2048',

        'gallery.*' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048',

    ]);

    $blog = new Blogs();

    $blog->title = $request->title;

    $blog->by = $request->by;

    $blog->date = $request->date;

    $blog->description = strip_tags($request->description);

    if($request->hasFile('image')){

        $file = $request->file('image');

        $filename = time().'_'.$file->getClientOriginalName();

        $file->move(public_path('uploads/blogs'),$filename);

        $blog->image = 'uploads/blogs/'.$filename;
    }

    $blog->save();

    if($request->hasFile('gallery')){

        foreach($request->file('gallery') as $image){

            $filename=time().'_'.$image->getClientOriginalName();

            $image->move(public_path('uploads/blogs/gallery'),$filename);

            $blog->images()->create([

                'image'=>'uploads/blogs/gallery/'.$filename

            ]);

        }

    }

    return redirect('admin/blogs')
        ->with('message','Blog Added Successfully');
}
    
    public function edit($id)
{
$blog = Blogs::with('images')->findOrFail($id);
    return view('admin.blogs.edit', compact('blog'));
}

public function update(Request $request,$id)
{
    $this->validate($request,[

        'title'=>'required|string|max:255',

        'by'=>'required|string|max:255',

        'date'=>'required|date',

        'description'=>'required|string|max:3000',

        'image'=>'nullable|image|mimes:jpeg,jpg,png,webp|max:2048',

        'gallery.*'=>'nullable|image|mimes:jpeg,jpg,png,webp|max:2048',

    ]);

    $blog=Blogs::findOrFail($id);

    $blog->title=$request->title;

    $blog->by=$request->by;

    $blog->date=$request->date;

    $blog->description=strip_tags($request->description);

    if($request->hasFile('image')){

        if($blog->image && file_exists(public_path($blog->image))){

            unlink(public_path($blog->image));

        }

        $file=$request->file('image');

        $filename=time().'_'.$file->getClientOriginalName();

        $file->move(public_path('uploads/blogs'),$filename);

        $blog->image='uploads/blogs/'.$filename;
    }

    $blog->save();

    if($request->hasFile('gallery')){

        foreach($request->file('gallery') as $image){

            $filename=time().'_'.$image->getClientOriginalName();

            $image->move(public_path('uploads/blogs/gallery'),$filename);

            $blog->images()->create([

                'image'=>'uploads/blogs/gallery/'.$filename

            ]);

        }

    }

    return redirect('admin/blogs')
        ->with('message','Blog Updated Successfully');
}

public function destroy($id)
{
    $blog=Blogs::with('images')->findOrFail($id);

    if($blog->image && file_exists(public_path($blog->image))){

        unlink(public_path($blog->image));

    }

    foreach($blog->images as $image){

        if(file_exists(public_path($image->image))){

            unlink(public_path($image->image));

        }

    }

    $blog->delete();

    return redirect('admin/blogs')
        ->with('message','Blog Deleted Successfully');
}
public function deleteGalleryImage($id)
{
    $image = \App\Models\BlogImage::findOrFail($id);

    if ($image->image && file_exists(public_path($image->image))) {

        unlink(public_path($image->image));

    }

    $image->delete();

    return back()->with(
        'message',
        'Gallery image deleted successfully.'
    );
}
}
