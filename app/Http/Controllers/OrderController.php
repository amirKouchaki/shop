<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class OrderController extends Controller
{
    public function create(Product $product){
        return view('employees.orders.create',[
            'product' => $product
        ]);
    }

    public function store(){
        $attributes = \request()->validate([
           'product_id'=>'required',
           'quantity' => ['required','numeric','min:1','max:'.\request('in_stock')]
        ]);
        $attributes['user_id'] = auth()->id();
        $order = Order::create($attributes);
        return redirect()->route('employees.dashboard')->with([
            'success'=> $order->quantity.' '.$order->product->name.($order->quantity==1?' is added to your shopping cart':'s are added to your shopping cart')
        ]);
    }
    public function index(){
        return view('employees.orders.index',[
            'orders' => auth()->user()->orders()->with('product')->get(),
            'customers' => Customer::all()
        ]);
    }
    public function destroy($product_id){
        \DB::table('orders')->where('user_id','=',auth()->id())
            ->where('product_id','=',$product_id)->delete();
        return back();
    }


}
