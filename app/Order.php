<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'product_id', 'invoice_no', 'user_id','status','created_at','updated_at'
    ];
}
