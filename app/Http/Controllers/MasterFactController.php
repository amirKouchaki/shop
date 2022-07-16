<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\DetailFact;
use App\Models\masterFact;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class MasterFactController extends Controller
{


    public function index(){
        return view('employees.masterFacts.index',[
            'factors' =>auth()->user()->factors()->with(['user','customer','detail_facts'])->paginate(2)
        ]);
    }



    public function store(){

        if(auth()->user()->orders->count()==0){
            return back();
        }
        //TODO html tampering
        //create a new master fact and then create necessary detail facts from order and then delete orders

        $sumPrice = 0;
        $orders = auth()->user()->orders()->with('product')->get();
        foreach ($orders as $order):
            $sumPrice += $order->quantity * $order->product->price;
        endforeach;

        $masterFactAttributes = [
            'user_id' => auth()->id(),
            'customer_id' => (int)\request('customer_id'),
            'sum_price' => $sumPrice,
            'end_price' => $sumPrice,
            'discount' => 0,
            'description' =>'this is the description'
        ];
        //TODO subtract the quantity from the in_stock
        $masterFact = MasterFact::create($masterFactAttributes);
        foreach ($orders as $order) {
            $masterFact->detail_facts()->create([
                'product_id' => $order->product_id,
                'quantity' => $order->quantity,
                'price' => (float)$order->product->price
            ]);
            Product::where('id', $order->product_id)->update(['in_stock' =>Product::find($order->product_id)->in_stock -$order->quantity]);
        }
        \DB::table('orders')->where('user_id','=',auth()->id())->delete();
        return redirect(route('employees.dashboard'))->with([
            'success' => 'your order has been registered'
        ]);
    }
}
