<?php
    function getCategory($is_select = 'no') {
        if($is_select == 'yes'){
            return Category::pluck('name', 'id');
        }
        return Category::all();
    }

    function getVariant($is_select = 'no') {
        if($is_select == 'yes'){
            return Variant::pluck('name', 'id');
        }
        return Variant::select('name', 'value', 'id')->get();
    }
    
    function getProduct($is_select = 'no') {
        if($is_select == 'yes'){
            return Product::pluck('name', 'id');
        }
        return Product::with('category', 'variant')->get();
    }

    function getProductFeatured($is_select = 'no') {
        if($is_select == 'yes'){
            return Product::where('is_featured', true)->pluck('name', 'id');
        }
        return Product::with('category', 'variant')->where('is_featured', true)->get();
    }

    function getProductTrending($is_select = 'no') {
        if($is_select == 'yes'){
            return Product::where('is_trending', true)->pluck('name', 'id');
        }
        return Product::with('category', 'variant')->where('is_trending', true)->get();
    }

    function getProductFestival($is_select = 'no') {
        if($is_select == 'yes'){
            return Product::where('is_festival', true)->pluck('name', 'id');
        }
        return Product::with('category', 'variant', 'date')->where('is_festival', true)->get();
    }

    function getProductDiscount($is_select = 'no') {
        if($is_select == 'yes'){
            return Product::where('discount', '>', 0)->pluck('name', 'id');
        }
        return Product::with('category', 'variant')->where('discount', '>', 0)->get();
    }
?>