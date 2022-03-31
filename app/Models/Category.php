<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'image',
        'is_blog',
        'remarks',
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
}
