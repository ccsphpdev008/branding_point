<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductReview;
use App\Models\BlogReview;
use App\Models\Category;
use App\Models\City;
use App\Models\Contact;
use App\Models\Banner;
use App\Models\HowItWorks;
use App\Models\CommonSettings;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use View, DB;
use App\Http\Controllers\Admin\Controller;

class FrontController extends Controller
{
    /**
     * Validation Rules For the Incoming Request
     */
    
    public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * Constructor Initialization
     */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function about()
    {
       
        return view('front.pages.about');
    }

    public function contact()
    {
        $data['settings'] = CommonSettings::pluck('data', 'field');
        
        return view('front.pages.contact', $data);
    }

    public function product()
    {
        return view('front.pages.product');
    }

    public function index()
    {
        $data['cities'] = City::pluck('name', 'id');
        $data['categories'] = Category::pluck('name', 'id');
        $data['products'] = Product::active()->get();
        $data['mostpopular'] = Product::select('*', DB::raw('(SELECT avg(point) from product_reviews where 
        product_reviews.product_id = products.id) as average_review'))->orderBy('average_review', 'DESC')->active()->get();
        $data['banners'] = Banner::all();
        $data['howitworks'] = HowItWorks::all();

        return view('front', $data);
    }

    public function contactSave(Request $request) {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'details' => 'required',
        ]);

        $contact = new Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->details = $request->details;
        $contact-> save();

        return redirect()->route('contact')->with('success','Item created successfully!');
    }
    public function productReview(Request $request, $id) {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'g-recaptcha-response' => 'required|captcha',
        ]);
        $review = new ProductReview;
        $review->product_id = $id;
        $review->name = $request->name;
        $review->email = $request->email;
        $review->review = $request->review;
        $review->point = $request->point;
        $review-> save();

        return redirect()->back()->with('success','Product Review Created Successfully!');
    }

    public function blogReview(Request $request, $id) {
        $comment = new BlogReview;
        $comment->blog_id = $id;
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->comment = $request->comment;
        $comment-> save();

        return redirect()->back()->with('success','Blog Review Created Successfully!');
    }

 }
