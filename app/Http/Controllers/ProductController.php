<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Category;
use App\Models\City;
use App\Http\Controllers\Admin\Controller;



use Illuminate\Http\Request;
use Illuminate\Support\Str;
use View, DB;

class ProductController extends Controller
{
    /**
     * Validation Rules For the Incoming Request
     */
    
    
    /**
     * Constructor Initialization
     */

    public function __construct()
    {
        $this->category = new Category;
        $this->city = new City;
        parent::__construct();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['categories'] = $this->category->pluck('name', 'id');
        $data['cities'] = $this->city->pluck('name', 'id');
        return view('front.product.product_add', $data);
    }

    public function productedit($id)
      {
        $data['categories'] = Category::pluck('name', 'id');
        $data['cities'] = City::pluck('name', 'id');
        $data['product'] = Product::with('images', 'reviews')->active()->find($id);
        return view('front.product.product_edit', $data);
      }

    public function productUpdate(Request $request, $id)
    {
        $this ->validate($request,[
            'title' => 'required',
            'category_id' => 'required',
            'city_id' => 'required',
            'address' => 'required',
            'email' => 'required',
            'phone' => 'required'
        ]);
        $product = Product::active()->find($id);
        if(!$product){
            return redirect()->back();
        }
        $product->title = $request->title;
        $product->position = $request->position;
        $product->category_id = $request->category_id;
        $product->keywords = $request->keywords;
        $product->longitude = $request->longitude;
        $product->latitude = $request->latitude;
        $product->city_id = $request->city_id;
        $product->address = $request->address;
        $product->email = $request->email;
        $product->phone = $request->phone;
        $product->website = $request->website;
        $product->backgroundimage = $request->backgroundimage;
        $product->yt_link = $request->yt_link;
        $product->fb_link = $request->fb_link;
        $product->insta_link = $request->insta_link;
        $product->wp_link = $request->wp_link;
        $product->linkedin_link = $request->linkedin_link;
        $product->twitter_link = $request->twitter_link;
        $product->details = $request->details;
        $product-> save();

        return redirect()->back();
        // return redirect()->route('product.image.view', $product->id);
    }
   
    public function productSave(Request $request){
        $this ->validate($request,[
            'title' => 'required',
            'category_id' => 'required',
            'city_id' => 'required',
            'address' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'g-recaptcha-response' => 'required|captcha',
        ]);
        $product = new Product();
        $product->title = $request->title;
        $product->position = $request->position;
        $product->category_id = $request->category_id;
        $product->keywords = $request->keywords;
        $product->longitude = $request->longitude;
        $product->latitude = $request->latitude;
        $product->city_id = $request->city_id;
        $product->address = $request->address;
        $product->email = $request->email;
        $product->phone = $request->phone;
        $product->website = $request->website;
        $product->backgroundimage = $request->backgroundimage;
        $product->yt_link = $request->yt_link;
        $product->fb_link = $request->fb_link;
        $product->insta_link = $request->insta_link;
        $product->wp_link = $request->wp_link;
        $product->linkedin_link = $request->linkedin_link;
        $product->twitter_link = $request->twitter_link;
        $product->details = $request->details;
        $product-> save();

        return redirect()->route('product.image.view', $product->id);
    }

    public function productImageView($id)
    {
        $data['categories'] = $this->category->pluck('name', 'id');
        $data['cities'] = $this->city->pluck('name', 'id');
        $data['product'] = Product::where('id', $id)->with('images')->active()->first();

        return view('front.product.product_image_upload', $data);
    }

    public function view( $id)
    {
        $product = Product::where('id', $id)->with('images', 'reviews')->active()->first();
        $product->update(['page_view' => ++$product->page_view]);
        return view('front.product.view', compact('product'));
    }

    public function productList()
    {
        $data['products'] = Product::active()->get();
        $data['categories'] = $this->category->pluck('name', 'id');
        $data['cities'] = $this->city->pluck('name', 'id');
        return view('front.product.product_list', $data);
    }

    public function productImageSave(Request $request, $id)
    {
        $product = Product::find($id);
        if(!$product){
            return;
        }

        $image = $request->file('file');   
        $imageName = time().'.'.$image->extension();
        $path = public_path('media/product/background-image/');
        $image->move($path,$imageName);

        $product->backgroundimage = 'public/media/product/background-image/'.$imageName;
        $product->save();
   
        return response()->json(['success'=>$imageName]);
    }

    public function productImageCarouselSave(Request $request, $id)
    {
        $product = Product::find($id)->active();
        if(!$product){
            return;
        }
        
        $image = $request->file('file');   
        $imageName = time().rand(1,100000).'.'.$image->extension();
        $path = public_path('media/product/carousel');
        $image->move($path,$imageName);

        $productImage = new ProductImage();
        $productImage->product_id = $id;
        $productImage->url = 'public/media/product/carousel/'.$imageName;
        $productImage->save();
   
        return response()->json(['success'=>$imageName]);
    }

    public function productImageCarouselRemove($id)
    {
        $productImage = ProductImage::find($id);
        if($productImage){
            $productImage->delete();
        }   
        return redirect()->back();
    }

    public function productImageRemove($id)
    {
        $product = Product::find($id)->active();
        if($product){
            $product->backgroundimage = null;
            $product->save();
        }   
        return redirect()->back();
    }


    public function productDelete($id){
        $product = Product::where('created_by', auth()->id())->active()->find($id);
        if($product){
            $product->delete();
        }
        return redirect()->route('profile.myproductlist');
      }
    
    
 }
