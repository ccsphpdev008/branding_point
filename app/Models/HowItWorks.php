<?php

namespace App\Models;

use App\Traits\AppOrdered;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HowItWorks extends Model
{
    use HasFactory,AppOrdered;

    protected $fillable = [
        'title',
        'image',
        'position',
        'description',
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
