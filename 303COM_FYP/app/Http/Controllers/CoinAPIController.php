<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class CoinAPIController extends Controller
{
    //    $key = "53C9B0CF-E34D-4EFC-8079-6A9A259ABA2F";

    public function updateAPI()
    {
        $key = "apikey=53C9B0CF-E34D-4EFC-8079-6A9A259ABA2F";
        // Clear Asset Table if not empty
        if (DB::table('asset')->whereNotNull("*")) {
            DB::table('asset')->delete();
        }

        $result = Http::get('https://rest.coinapi.io/v1/exchangerate/MYR?' . $key);

        $rates = json_decode($result->getBody()->getContents())->rates;

        foreach ($rates as $row) {
            $type = NULL;
            if ($row->asset_id_quote == "USD" || $row->asset_id_quote == "SGD") $type = "Fiat";
            else if ($row->asset_id_quote == "ETH" || $row->asset_id_quote == "DAI" || $row->asset_id_quote == "UNI") $type = "Crypto";

            if ($type != NULL) {

                $data = array(
                    "asset_type" => $type,
                    "asset_quote" => $row->asset_id_quote,
                    "asset_rate" => sprintf('%f', floatval($row->rate)),
                    "updated_at" => \Carbon\Carbon::now()->toDateTimeString()
                );

                // $data = $collection->where('asset_id_quote', '$ETH');
                DB::table('asset')->insert($data);
            }
        }

        $asset = DB::table('asset')->get();

        // return back()->with('alert', 'CoinAPI Updated Successfully!');
        return back();
    }
}
