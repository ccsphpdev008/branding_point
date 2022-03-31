<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\ProductImage;
use App\Models\Category;
use App\Models\City;



use Illuminate\Http\Request;
use Illuminate\Support\Str;
use View, DB;
use App\Http\Controllers\Admin\Controller;

class BlogController extends Controller
{
    /**
     * Validation Rules For the Incoming Request
     */
    
    /**
     * Constructor Initialization
     */
    public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['blogs'] = Blog::all();
        return view('front.blog.blog_list', $data);
    }

    public function view( $id)
    {
        $blog = Blog::where('id', $id)->with( 'reviews')->first();
        $categories = Category::pluck('name', 'id');
        $blog->update(['page_view' => ++$blog->page_view]);
        return view('front.blog.blog_view', compact('blog', 'categories'));
    }

    
 }
