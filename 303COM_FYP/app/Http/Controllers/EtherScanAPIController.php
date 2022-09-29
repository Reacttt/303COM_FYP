<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class EtherScanAPIController extends Controller
{
    /**
     * Validate Metamask Transaction
     *
     * @return void
     */
    public function validateHash()
    {
        $admin_wallet = "0xE8dEc2A51E0E6F15a4917306c486165dFb395f1f";
        $payment_details = DB::table('payment_details')->where('payment_method', 'Crypto')->where('created_at', '<', \Carbon\Carbon::now()->subMinutes(1))->where('payment_status', 0)->get();
        $result = null;

        foreach ($payment_details as $payment) {
            //get transaction information from etherscan
            $response = $this->checkWithEtherScan($payment->payment_transaction);
            //validate response
            if ($response && array_key_exists('result', $response)) {
                $tr_data = $response['result'];
                //validate transaction destination with our account [destination must be our master account].
                if (strtolower($tr_data['to']) == strtolower($admin_wallet)) {
                    // Update Transaction As Success
                    $data = array(
                        "payment_status" => 1,
                        "updated_at" => \Carbon\Carbon::now()->toDateTimeString(),
                    );

                    DB::table('payment_details')->where('payment_details_id', $payment->payment_details_id)->update($data);
                } else {
                    // Update Transaction As Canceled
                    $data = array(
                        "payment_status" => 3,
                        "updated_at" => \Carbon\Carbon::now()->toDateTimeString(),
                    );

                    DB::table('payment_details')->where('payment_details_id', $payment->payment_details_id)->update($data);
                }
            } else {
                // Update Transaction As Canceled
                $data = array(
                    "payment_status" => 3,
                    "updated_at" => \Carbon\Carbon::now()->toDateTimeString(),
                );

                DB::table('payment_details')->where('payment_details_id', $payment->payment_details_id)->update($data);
            }

            $result++;
        }

        return back()->with('alert', 'Hash Validated Successfully' . $result);
    }

    /**
     * Check Transaction With Ether Scan
     *
     * @param  mixed $transaction_hash
     * @return mixed
     */
    public function checkWithEtherScan($transaction_hash)
    {
        $api_key = "2KDYFSQ6QUHZBWT4HREMYT3W8X35Y35PDW"; // API Key from Etherscan.io
        $test_network = "https://api-ropsten.etherscan.io"; // Ethereum Test Net
        $main_network = "https://etherscan.io"; // Ethereum Main Net.

        $response = Http::get($test_network . "/api/?module=proxy&action=eth_getTransactionByHash&txhash="
            . $transaction_hash . '&apikey=' . $api_key);
        return $response->json();
    }
}
