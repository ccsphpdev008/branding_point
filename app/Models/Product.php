<?php

namespace App\Models;

use App\Traits\AppOrdered;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Product extends Model
{
    use HasFactory, SoftDeletes;//, AppOrdered;

    protected $fillable = [
        'title',
        'position',
        'category_id',
        'keywords',
        'longitude',
        'latitude',
        'city_id',
        'address',
        'email',
        'phone',
        'website',
        'backgroundimage',
        'is_check',
        'yt_link',
        'fb_link',
        'insta_link',
        'wp_link',
        'linkedin_link',
        'twitter_link',
        'details',
        'remarks',
        'page_view',
        'created_by',
        'updated_by'
    ];
    
    public function dependencies() {
        $arr = [];
        return $arr;
    }

    public function bywhom(){
        return $this->belongsTo(UserMaster::class, 'created_by', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function city(){
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    public function images(){
        return $this->hasMany(ProductImage::class);
    }

    public function reviews(){
        return $this->hasMany(ProductReview::class);
    }

    public function scopeMydata($query){
        return $query->where('created_by', auth()->id());
    }

    public function scopeActive($query){
        return $query->where('is_check', true);
    }
}
