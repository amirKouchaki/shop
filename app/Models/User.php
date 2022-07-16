<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use function Symfony\Component\Translation\t;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     *
     */

   protected $guarded = [];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    //mutators


    // public function setPasswordAttribute($password){
    //     $this->attributes['password'] = bcrypt($password);
    // }

    //relations
    public function products(){
        return $this->hasMany(Product::class);
    }
    public function orders(){
        return $this->hasMany(Order::class);
    }
    public function admin(){
        return $this->belongsTo(User::class,'super_id');
    }
    public function employees(){
        return $this->hasMany(User::class,'super_id','id');
    }
    public function factors(){
        return $this->hasMany(Masterfact::class,'user_id');
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
