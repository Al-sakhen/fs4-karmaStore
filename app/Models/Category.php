<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // fillabel guarded
    protected $guarded = [];


    // relations childrens - parent

    public function childrens(){
        return $this->hasMany(Category::class , 'parent_id' , 'id') ;
    }

    public function parent(){
        return $this->belongsTo(Category::class , 'parent_id' , 'id') ;
    }

    public function products(){
        return $this->hasMany(Product::class) ;
    }
}

