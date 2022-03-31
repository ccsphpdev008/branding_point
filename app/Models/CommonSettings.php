<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class CommonSettings extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'field', 'data', 'is_more', 'more_name', 'created_by', 'updated_by'
    ];

    public function dependencies() {
        $arr = [];
        return $arr;
    }

    public function bywhom(){
        //return $this->belongsTo(UserMaster::class, 'created_by', 'id');
    }
}
