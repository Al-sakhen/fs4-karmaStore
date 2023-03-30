<?php

namespace App\Http\Controllers\Payments;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
use PayPalHttp\HttpException;

class PaypalController extends Controller
{
    public function create($orderId)
    {
        $order = Order::findOrFail($orderId);
        $client = app('paypal.client');

        $request = new OrdersCreateRequest();
        $request->prefer('return=representation');
        $request->body = [
            "intent" => "CAPTURE",
            "purchase_units" => [[
                "reference_id" => $order->id,
                "amount" => [
                    "value" => $order->amount,
                    "currency_code" => "USD"
                ]
            ]],
            "application_context" => [
                "cancel_url" => route('paypal.cancel', $order->id),
                "return_url" => route('paypal.return', $order->id)
            ]
        ];

        try {
            // Call API with your client and get a response for your call
            $response = $client->execute($request);

            // If call returns body in response, you can get the deserialized version from the result attribute of the response
            if ($response->statusCode == 201) {
                foreach ($response->result->links as $link) {
                    if ($link->rel == 'approve') {
                        return redirect()->away($link->href);
                    }
                }
            }
        } catch (HttpException $ex) {
            $order = Order::findOrFail($orderId);
            $order->update([
                'status' => 'declined'
            ]);
            return redirect()->route('home')->with('error' , 'Order cancelled successfully');
        }
    }


    public function callback(Request $request ,$orderId)
    {
        $order = Order::findOrFail($orderId);
        $client = app('paypal.client');
        $token = $request->query('token');

        $request = new OrdersCaptureRequest($token);
        $request->prefer('return=representation');
        try {
            // Call API with your client and get a response for your call
            $response = $client->execute($request);

            // If call returns body in response, you can get the deserialized version from the result attribute of the response
            if($response->statusCode == 201 && $response->result->status == 'COMPLETED'){
                $order->update([
                    'status' => 'completed'
                ]);
                return redirect()->route('home')->with('success' , 'Order completed successfully');
            }
        } catch (HttpException $ex) {
            $order = Order::findOrFail($orderId);
            $order->update([
                'status' => 'declined'
            ]);
            return redirect()->route('home')->with('error' , 'Order cancelled successfully');
        }
    }

    public function cancel($orderId)
    {
        $order = Order::findOrFail($orderId);
        $order->update([
            'status' => 'declined'
        ]);
        return redirect()->route('home')->with('error' , 'Order cancelled successfully');
    }
}
