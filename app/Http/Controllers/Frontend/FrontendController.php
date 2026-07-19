<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Mail\AppointmentMail;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use App\Models\ReviewsModel;
use App\Models\Blogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;
use App\Models\Banner;
use App\Models\InstagramFeed;
use App\Models\Subscriber;

class FrontendController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('status','0')->get(); 
        $about = \App\Models\About::first();
        $aboutData = \App\Models\AboutData::first();
        $trendingProducts = Product::where('trending','1')->latest()->take(15)->get();
        $newArrivalsProducts = Product::latest()->take(14)->get();
        $featuredProducts = Product::where('featured','1')->latest()->take(14)->get();
    $collections = Category::where('status','0')
        ->where('menu','Collections')
        ->get();

    $highJewelry = Category::where('status','0')
        ->where('menu','High Jewelry')
        ->get();

    $adSignature = Category::where('status','0')
        ->where('menu','AD Signature')
        ->get();
        $reviews= ReviewsModel::where('status','0')->get();
        $threecategories = Category::where('status','0')->take(3)->get();
        $blogs = Blogs::all();
$banner = Banner::first();
$instaFeeds = InstagramFeed::where('status','0')->latest()->take(8)->get();
        return view('frontend.index',compact('sliders','about','aboutData','trendingProducts','newArrivalsProducts','featuredProducts','collections','highJewelry','adSignature','reviews','threecategories','blogs','banner','instaFeeds'));
    }


    public function searchProducts(Request $request)
    {
if($request->search)
{
$searchProducts = Product::where('name','LIKE','%'.$request->search.'%')->latest()->paginate(15);
return view('frontend.pages.search',compact('searchProducts'));
}
else{
return redirect()->back()->with('message','Empty Search');
}
    }


    public function newArrival()
    {
        $newArrivalsProducts = Product::latest()->take(16)->get();
        return view('frontend.pages.new-arrival',compact('newArrivalsProducts'));
    }


    public function featuredProducts()
    {
        $featuredProducts = Product::where('featured','1')->latest()->get();
        return view('frontend.pages.featured-products',compact('featuredProducts'));
    }


  public function categories()
{
    $collections = Category::where('status','0')
        ->where('menu','Collections')
        ->get();

    $highJewelry = Category::where('status','0')
        ->where('menu','High Jewelry')
        ->get();

    $adSignature = Category::where('status','0')
        ->where('menu','AD Signature')
        ->get();

    return view(
        'frontend.collections.category.index',
        compact(
            'collections',
            'highJewelry',
            'adSignature'
        )
    );
}
public function categoriescollections()
{
    $collections = Category::where('status','0')
        ->where('menu','Collections')
        ->get();

    $highJewelry = Category::where('status','0')
        ->where('menu','High Jewelry')
        ->get();

    $adSignature = Category::where('status','0')
        ->where('menu','AD Signature')
        ->get();

    return view(
        'frontend.collections.category.collections',
        compact(
            'collections',
            'highJewelry',
            'adSignature'
        )
    );
}
    public function products($category_slug)
    {
        $inStockCount = Product::where('quantity', '>', 0)->count();
        $outOfStockCount = Product::where('quantity', '=', 0)->count();
        $category = Category::where('slug',$category_slug)->withCount('products')->first();
$collections = Category::where('status','0')
    ->where('menu','Collections')
    ->get();

$highJewelry = Category::where('status','0')
    ->where('menu','High Jewelry')
    ->get();

$adSignature = Category::where('status','0')
    ->where('menu','AD Signature')
    ->get();
        if($category){
            // $products = $category->products()->get();
return view(
    'frontend.collections.products.index',
    compact(
        'category',
        'collections',
        'highJewelry',
        'adSignature',
        'inStockCount',
        'outOfStockCount'
    )
);
         } else{
                return redirect()->back();
            }
        }
    
public function productView(string $category_slug , string $product_slug)
{
    $category = Category::where('slug',$category_slug)->first();
    if($category){
         $product = $category->products()->where('slug',$product_slug)->where('status','0')->first();
         if($product)
         {
            return view('frontend.collections.products.view',compact('product','category')); 
         }
         else{
            return redirect()->back();
        }
     } else{
            return redirect()->back();
        }
}

public function aboutus()
{
    $about = \App\Models\About::first();
    $aboutData = \App\Models\AboutData::first();
    return view('frontend.aboutus', compact('about','aboutData'));
}

public function blogs()
{
    $blogs = Blogs::all();
    return view('frontend.blogs.bloglist' , compact('blogs'));
}

public function blogdetails($id)
{
    // Load blog with gallery images
    $blog = Blogs::with('images')->findOrFail($id);

    // Latest posts for sidebar
    $latestBlogs = Blogs::latest()
        ->where('id', '!=', $id)
        ->take(4)
        ->get();

    return view(
        'frontend.blogs.blogdetails',
        compact('blog', 'latestBlogs')
    );
}
public function contactus()
{
    return view('frontend.contactus');
}

public function thankyou()
{
    return view('frontend.thank-you');
}

public function contactsubmit(Request $request)
{
    $validator = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'nullable|email|max:255',
        'phone' => [
            'required',
            'string',
            function ($attribute, $value, $fail) {
                $digitsOnly = preg_replace('/\D/', '', $value);
                if (strlen($digitsOnly) < 8 || strlen($digitsOnly) > 15) {
                    $fail('The phone number must be between 8 and 15 digits.');
                }
            },
        ],
        'subject' => 'required|string|max:255',
        'message' => 'required|string|max:1000'
    ], [
        'name.required' => 'Please enter your name',
        'name.string' => 'Name must be valid text',
        'name.max' => 'Name cannot exceed 255 characters',
        'email.email' => 'Please enter a valid email address',
        'email.max' => 'Email cannot exceed 255 characters',
        'phone.required' => 'Phone number is required',
        'subject.required' => 'Please enter a subject',
        'subject.max' => 'Subject cannot exceed 255 characters',
        'message.required' => 'Please enter your message',
        'message.max' => 'Message cannot exceed 1000 characters',
    ]);

    // Clean phone number - keep only digits
    $cleanPhone = preg_replace('/\D/', '', $request->phone);
    
    $emailData = [
        'name' => $request->name,
        'email' => $request->email ?? 'No email provided',
        'phone' => $cleanPhone,
        'subject' => $request->subject,
        'message' => $request->message,
    ];

    Mail::to('mcheikhayla26@gmail.com')->send(new ContactFormMail($emailData));
    
    return back()->with('success', 'Your message has been submitted successfully.');
}
public function appointment()
{
    return view('frontend.appointment.index');
}
public function bookAppointment(Request $request)
{
    $validator = Validator::make($request->all(), [

        'name' => 'required|string|max:255',

        'email' => 'nullable|email|max:255',

        'phone' => [
            'required',

            function ($attribute, $value, $fail) {

                $digits = preg_replace('/\D/', '', $value);

                if (strlen($digits) < 8 || strlen($digits) > 15) {

                    $fail(
                        'Phone number must be between 8 and 15 digits.'
                    );
                }
            }
        ],

        'subject' => 'required|string|max:255',

        'message' => 'required|string|max:1000',

        'appointment_date' => 'required|date',

        'appointment_time' => 'required|date_format:H:i',

    ]);


    if ($validator->fails()) {

        return redirect()
            ->back()
            ->withErrors($validator)
            ->withInput();
    }


    /*
    |--------------------------------------------------------------------------
    | Validated Data
    |--------------------------------------------------------------------------
    */

    $validatedData = $validator->validated();


    /*
    |--------------------------------------------------------------------------
    | Prepare Email Data
    |--------------------------------------------------------------------------
    */

    $emailData = [

        'name' => $validatedData['name'],

        'email' => $validatedData['email'] ?? 'Not Provided',

        'phone' => preg_replace(
            '/\D/',
            '',
            $validatedData['phone']
        ),

        'subject' => $validatedData['subject'],

        'message' => $validatedData['message'],

        'appointment_date' => $validatedData['appointment_date'],

        /*
         * IMPORTANT:
         *
         * Send the actual submitted time.
         */

        'appointment_time' => $validatedData['appointment_time'],

    ];


    /*
    |--------------------------------------------------------------------------
    | Send Email
    |--------------------------------------------------------------------------
    */

    Mail::to('mcheikhayla26@gmail.com')
        ->send(
            new AppointmentMail($emailData)
        );


    /*
    |--------------------------------------------------------------------------
    | Redirect Back
    |--------------------------------------------------------------------------
    */

    return redirect()
        ->back()
        ->with(
            'success',
            'Your appointment has been booked successfully. We will contact you shortly.'
        );
}
public function subscribe(Request $request)
{
    $request->validate([
'email' => 'required|email|unique:subscriber,email',
    ]);
    $subscribe = new Subscriber();
$subscribe->email = $request->email;
$subscribe->save();
return back()->with('success','you have been subscribed successfully.');

}


public function quickView($id)
{
    $product = Product::with('productImages')->find($id);

    return response()->json($product);
}

}
