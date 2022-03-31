<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name', 'created_by', 'updated_by'
    ];

    public function dependencies() {
        $arr = [
            ['App\Models\UserMaster', 'role_id', 'id'],
        ];
        return $arr;
    }

    public function bywhom(){
        return $this->belongsTo(UserMaster::class, 'created_by', 'id');
    }

    public function scopeMydata($query){
        return $query->where('created_by', auth()->id());
    }
}
