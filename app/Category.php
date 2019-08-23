<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name', 'status','status','created_by','updated_by','created_at','updated_at'
    ];
}
