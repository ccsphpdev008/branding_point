<?php

namespace App\Models;

use App\Traits\AppOrdered;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory, SoftDeletes, AppOrdered;

    protected $fillable = [
        'title',
        'position',
        'details',
        'category_id',
        'image',
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

    public function scopeMydata($query){
        return $query->where('created_by', auth()->id());
    }
    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function reviews(){
        return $this->hasMany(BlogReview::class);
    }
}
