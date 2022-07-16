<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterFact extends Model
{
    use HasFactory;


    public function detail_facts(){
        return $this->hasMany(DetailFact::class,'master_fact_id','id');
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function customer(){
        return $this->belongsTo(Customer::class);
    }
}
