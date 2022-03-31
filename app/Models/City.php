<?php

namespace App\Models;

use App\Traits\AppOrdered;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use HasFactory, SoftDeletes, AppOrdered;

    protected $fillable = [
        'name',
        'state_id',
        'position',
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
    public function state(){
        return $this->belongsTo(State::class, 'state_id', 'id');
    }

    public function scopeMydata($query){
        return $query->where('created_by', auth()->id());
    }
}
