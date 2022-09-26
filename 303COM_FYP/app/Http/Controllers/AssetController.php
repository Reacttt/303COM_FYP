<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class AssetController extends Controller
{
    //    $key = "53C9B0CF-E34D-4EFC-8079-6A9A259ABA2F";

    public function updateAPI()
    {
        $key = "apikey=53C9B0CF-E34D-4EFC-8079-6A9A259ABA2F";
        $result = Http::get('https://rest.coinapi.io/v1/exchangerate/MYR?'.$key);
        
        $rates = json_decode($result->getBody()->getContents())->rates;

        foreach ($rates as $row) {
            $data = array(
                "asset_quote" => $row->asset_id_quote,
                "asset_rate" => $row->rate,
                "updated_at" => \Carbon\Carbon::now()->toDateTimeString()
            );

            // $data = $collection->where('asset_id_quote', '$ETH');
            DB::table('asset')->insert($data);
        }

        $asset = DB::table('asset')->get();

        return view('/coinAPI', compact('asset'))->with('alert', 'CoinAPI Updated Successfully!');
    }
}
