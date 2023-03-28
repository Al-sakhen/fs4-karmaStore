<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * 1- create new order
     * 2- store order items
     * 3- redirect to checkout page
     */

    public function store(Request $request)
    {
        $order = Order::create([
            'user_id' => auth()->user()->id,
            'amount' => $request->amount,
        ]);

        $items= [];
        foreach(session()->get('cart') as $item){
            $items[] =[
                'product_id' => $item['id'],
                'quantity' =>  $item['quantity'],
            ];
        }

        $order->items()->createMany($items);
        session()->forget('cart');

        return redirect()->route('checkout' , $order->id)->with('success' , 'Order has been created successfully');
    }
}
