<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserMaster extends Authenticatable
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'password',
        'contact',
        'role_id',
        'business_name',
        'business_logo',
        'button_color',
        'bg_color',
        'text_color',
        'is_password_changed',
        'created_by',
        'updated_by'
    ];

    public function dependencies() {
        $arr = [
            ['App\Models\Category', 'created_by', 'id'],
            ['App\Models\ClientMaster', 'created_by', 'id'],
            ['App\Models\CustomOrder', 'created_by', 'id'],
            ['App\Models\Item', 'created_by', 'id'],
            ['App\Models\UserMaster', 'created_by', 'id'],
        ];
        return $arr;
    }

    public function role(){
        return $this->belongsTo(Roles::class, 'role_id', 'id');
    }

    public function bywhom(){
        return $this->belongsTo(UserMaster::class, 'created_by', 'id');
    }
    
    public function scopeMydata($query){
        return $query->where('created_by', auth()->id());
    }
}
