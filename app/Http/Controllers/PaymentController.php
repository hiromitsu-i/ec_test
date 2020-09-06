<?php

namespace App\Http\Controllers;

use App\Delivery;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    //決済画面
    public function payment(Request $request)
    {
        $payments = $request->input();

        return view('payment')->with('payments',$payments);
    }

    public function complete(Request $request)
    {
        $payment = $request->input();

        $result = Delivery::create([
                'address' => $payment['prefecture'].$payment['city'].$payment['address'].$payment['building'],
                'items' => json_encode($payment['id']),
                'amount'=>$payment['amount']
            ]);

        return view('complete');

    }
}
