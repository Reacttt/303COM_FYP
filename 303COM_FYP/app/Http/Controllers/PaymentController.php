<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    public function addPayment(Request $request)
    {
        $created_at = \Carbon\Carbon::now()->toDateTimeString();

        if ($request->payment_method != "Crypto") $payment_transaction = Hash::make('transaction');
        else $payment_transaction = $request->payment_transaction;

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
            "payment_currency" => $request->payment_currency,
            "payment_transaction" => $payment_transaction,
            "payment_status" => $request->payment_status,
            "created_at" => $created_at
        );

        DB::table('payment_details')->insert($data);

        if ($request->payment_method != "Crypto") {
            $data = array(
                "order_status" => "Pending Shipment",
                "updated_at" => \Carbon\Carbon::now()->toDateTimeString()
            );
    
            DB::table('order')->where('order_id', $request->order_id)->update($data);
        }
        

        if ($request->payment_method != "Crypto")
            return redirect('order')->with('alert', $request->payment_method . ' Payment Successful!');
        else
            return redirect('order')->with('alert', $request->payment_method . ' Payment Submitted Successful!');
    }
}
