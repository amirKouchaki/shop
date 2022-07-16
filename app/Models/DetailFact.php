<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailFact extends Model
{
    use HasFactory;

    public function master_fact(){
        return $this->belongsTo(MasterFact::class);
    }
    public function product(){
        return $this->belongsTo(Product::class);
    }

    protected $with = ['product'];
}
