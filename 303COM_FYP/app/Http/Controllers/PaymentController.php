<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PaymentController extends Controller
{
    public function addPayment(Request $request)
    {
        $created_at = \Carbon\Carbon::now()->toDateTimeString();

        // Credit Card Validation
        // $this->validate($request, [  
        //     'cc_name' => 'required',
        //     'cc_number' => 'required',
        //     'cc_exp' => 'required',
        //     'cc_code' => 'required',
        // ]);

        $data = array(
            "order_id" => $request->order_id,
            "payment_total" => $request->payment_amount,
            "payment_method" => $request->payment_method,
            "payment_transaction" => Hash::make('transaction'),
            "payment_status" => 1,
            "created_at" => $created_at
        );

        DB::table('payment_details')->insert($data);

        $data = array(
            "order_status" => "Pending Shipment",
            "updated_at" => \Carbon\Carbon::now()->toDateTimeString()
        );

        DB::table('order')->where('order_id', $request->order_id)->update($data);

        return redirect('order')->with('alert', 'Credit Card Payment Successful!');
    }

    public function addMetamaskTransaction(Request $request) 
    {
        $data = array(
        "txHash" => $request->txHash,
        "amount" => $request->amount,
        );

        return redirect('/')->with('alert', 'Metamask Payment Successful! txHash:' . $request->txHash . " Amount: " . $request->amount);
    }
}
