<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class UserProductController extends Controller
{
    //TODO get rid of the duplication
    public function index(){
        return view('dashboard',[
            'products' => Product::paginate(30)
        ]);
    }

}
