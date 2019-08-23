<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = [
        'category_id', 'title', 'description','image','price','status','created_by','updated_by','created_at','updated_at'
    ];
}
