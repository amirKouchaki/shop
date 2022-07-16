<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    //TODO check the $this->authorize reason for protecting the server with backend
    public function index(){
        return view('dashboard',[
            'products' => Product::paginate(30)
        ]);
    }

    public function create(){

        return view('admins.products.create');
    }
    public function store(){
        $attributes = \request()->validate([
            'name' => ['required','max:255','string'],
            'in_stock' => ['required','numeric'],
//          TODO check the price to be a decimal with 2 places
            'slug'=>['required',],
            'currency' => ['required'],
            'price'=>['required'],
            'avatar' => ['required','image']
        ]);
        $attributes = array_merge($attributes,[
            'avatar'=> \request()->file('avatar')->store('products/avatars')
        ]);
        auth()->user()->products()->create($attributes);

        return redirect(route('admins.dashboard'));
    }
}
