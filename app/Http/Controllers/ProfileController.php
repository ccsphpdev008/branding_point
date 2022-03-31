<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\Controller;

class ProfileController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
      public function dashboard()
      {
           return view('front.profile.dashboard');
      }

      public function myproductlist()
      {
          $data['products'] = Product::with('images', 'reviews')->active()->get();
          return view('front.profile.myproductlist', $data);
      }

      public function profileEdit(){
          $data['user'] = auth()->user();
          return view('front.profile.user_edit', $data);
      }

      public function profileUpdate(Request $request) {
        $rules = ['name' => 'required'];
        if($request->has('is_password')){
            $rules['password'] = 'required';
        }
        $request->validate($rules);

        
        $user = User::find(auth()->id());
        if(!$user){
            return redirect()->back();
        }
        $user->name = $request->name;
        if($request->hasFile('image')){
            $user->image = $this->uploadImage($request->file('image'), 'public/media/profile/image/', 'image');
        }
        if($request->has('is_password')){
            $user->password = \Hash::make($request->password);
        }
        $user->save();

        return redirect()->back();
        // return redirect()->route('product.image.view', $product->id);
    }
      
}
