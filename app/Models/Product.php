<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    //TODO check the query scoping again
    //TODO complete the currency conversion
    //TODO learn about match

    public function Orders(){
        return $this->hasMany(Order::class,'product_id','id');
    }
}
